<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vaccine;

class VaccineController extends Controller
{
    public function show ($current_doc_id) {
      $vname = array("BCG", "Hep B", "Hib","DTap/DPT/Tdap", "OPV/IPV", "PCV", "MMR", "Varicella", "Rubella", "HFV");
      $vtiming = array("After Birth", "2 months", "4 months", "6 months", "12 months", "18 months", "Grade 1", "Grade 9", "Grade 11");
      $vdescription = array(
       "Bacilus, Calmette-Guerin(against Tuberculosis)",
       "Hepatitus B",
       "Heamophilus Influenzae Type B",
       "Diptheria, Tetanus and acellular Pertussis / Diptheria, Pertussis and Tetanus / Tetanus, reduced Diptheria & reduced Pertussis",
       "Oral Pollivirus Vaccine",
       "Pneumococcal Conjugate Vaccine",
       "Measles, Mumps and Rubella",
       "Varicella",
       "Rubella",
       "Human Papillomavirus"
     );

      return view ('docregform_vaccinedetails')
        ->with('current_doc_id', $current_doc_id)
        ->with('vname', $vname)
        ->with('vtiming', $vtiming)
        ->with('vdescription', $vdescription);
    }

    public function doctorvaccinestore (Request $request) {
      for ($i = 0; $i < 10; $i++) {
        $vaccine = new Vaccine;
        $vaccine->vname = $request->vname[$i];
        $vaccine->vtiming = $request->vtiming[$i];
        $vaccine->doc_id = $request->doc_id;
        $vaccine->vdescription = $request->vdescription[$i];
        $vaccine->save();
      }
      $current_doc_id = $vaccine->doc_id;
      return view ('docregform_vaccinedetails')->with('current_doc_id', $current_doc_id);
    }
}
