<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Value;
use RealRashid\SweetAlert\Facades\Alert;

class VikorController extends Controller
{
    public function assessmentFilled()
    {
        //cek apakah sudah ada data di tabel values
        $assessment = Value::all();
        return $assessment->isNotEmpty();
    }

    public function index()
    {

        if (!$this->assessmentFilled()) {
            Alert::error("Error", "Data penilaian belum diisi!");
            return redirect()->route('values.index');

        }
        $criterias = Criteria::all();
        $alternatives = Alternative::all();
        $values = Value::all();
        $weights = $criterias->pluck('weight');
        $f_plus = [];
        $f_min = [];

        // calculate f_plus max for each criteria value and f_min min for each criteria value
        foreach ($criterias as $criteria) {
            $criteriaId = $criteria->id;
            $f_plus[$criteriaId] = $values->where('criteria_id', $criteriaId)->pluck('score')->max();
            $f_min[$criteriaId] = $values->where('criteria_id', $criteriaId)->pluck('score')->min();
        }

        // normalize matriks
        $normalizedMatrix = [];

        foreach ($values as $value) {
            $criteriaId = $value->criteria_id;
            $alternativeId = $value->alternative_id;
            $value = $value->score;

            if (!isset($normalizedMatrix[$alternativeId])) {
                $normalizedMatrix[$alternativeId] = [];
            }

            $normalizedMatrix[$alternativeId][$criteriaId] = ($f_plus[$criteriaId] - $value) / ($f_plus[$criteriaId] - $f_min[$criteriaId]);
        }

        // calculate weighted matrix
        $weightedMatrix = [];

        foreach ($normalizedMatrix as $alternativeId => $criteriaValues) {
            foreach ($criteriaValues as $criteriaId => $normalizedValue) {
                if (!isset($weightedMatrix[$alternativeId])) {
                    $weightedMatrix[$alternativeId] = [];
                }

                $weightedMatrix[$alternativeId][$criteriaId] = $normalizedValue * $weights[$criteriaId - 1];
            }
        }

        // calculate utility measure (S and R)
        foreach ($weightedMatrix as $alternativeId => $criteriaValues) {
            $s[$alternativeId] = 0;
            $r[$alternativeId] = 0;
            foreach ($criteriaValues as $criteriaId => $weightedValue) {
                $s[$alternativeId] += $weightedValue;
                $r[$alternativeId] = max($r[$alternativeId], $weightedValue);
            }
        }

        // calculate vikor index (Q)
        $s_min = min($s);
        $s_max = max($s);
        $r_min = min($r);
        $r_max = max($r);
        $v = 0.5;


        foreach ($s as $alternativeId => $s_value) {
            $r_value = $r[$alternativeId];
            $q[$alternativeId] = ($v * (($s_value - $s_min) / ($s_max - $s_min))) + ((1 - $v) * (($r_value - $r_min) / ($r_max - $r_min)));
        }

        // merge array q and alternative
        $result = array_combine($alternatives->pluck('name')->toArray(), $q);

        // sort result by q dari rendah ke tinggi
        arsort($result);
        asort($result);

        return view('dashboard.calculation', compact(
            'criterias',
            'alternatives',
            'values',
            'weights',
            'normalizedMatrix',
            'weightedMatrix',
            's',
            'r',
            'q',
            'result',
        ));
    }
}
