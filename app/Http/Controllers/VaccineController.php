<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vaccine;

class VaccineController extends Controller
{
    public function show ($current_doc_id) {
      $vdetails = array (
        //BCG 1st
        "BCG",
        "After Birth",
        "Bacilus, Calmette-Guerin(against Tuberculosis)",
        //Hep B 2nd
        "Hep B (Dose-1)",
        "After Birth",
        "Hepatitus B",
        //Hep B 3rd
        "Hep B (Dose-2)",
        "2 months",
        "Hepatitus B",
        //Hep B 4th
        "Hep B (Dose-3)",
        "4 months",
        "Hepatitus B",
        //Hep B 5th
        "Hep B (Dose-4)",
        "6 months",
        "Hepatitus B",
        //Hib 6th
        "Hib (Dose-1)",
        "2 months",
        "Heamophilus Influenzae Type B",
        //Hib 7th
        "Hib (Dose-2)",
        "4 months",
        "Heamophilus Influenzae Type B",
        //Hib 8th
        "Hib (Dose-3)",
        "6 months",
        "Heamophilus Influenzae Type B",
        //Hib 10th
        "Hib (Dose-4)",
        "18 months",
        "Heamophilus Influenzae Type B",
        //DTap/Tdap 11th
        "DTap/DPT/Tdap (Dose-1 [DTap])",
        "2 months",
        "Diptheria, Tetanus and acellular Pertussis / Diptheria, Pertussis and Tetanus / Tetanus, reduced Diptheria & reduced Pertussis",
        //DTap/Tdap 12th
        "DTap/DPT/Tdap (Dose-2 [DTap])",
        "4 months",
        "Diptheria, Tetanus and acellular Pertussis / Diptheria, Pertussis and Tetanus / Tetanus, reduced Diptheria & reduced Pertussis",
        //DTap/Tdap 13th
        "DTap/DPT/Tdap (Dose-3 [DTap])",
        "6 months",
        "Diptheria, Tetanus and acellular Pertussis / Diptheria, Pertussis and Tetanus / Tetanus, reduced Diptheria & reduced Pertussis",
        //DTap/Tdap 14th
        "DTap/DPT/Tdap (Dose-4 [DTap])",
        "18 months",
        "Diptheria, Tetanus and acellular Pertussis / Diptheria, Pertussis and Tetanus / Tetanus, reduced Diptheria & reduced Pertussis",
        //DTap/Tdap 15th
        "DTap/DPT/Tdap (Dose-5 [DTap])",
        "Grade 1",
        "Diptheria, Tetanus and acellular Pertussis / Diptheria, Pertussis and Tetanus / Tetanus, reduced Diptheria & reduced Pertussis",
        //DTap/Tdap 16th
        "DTap/DPT/Tdap (Dose-6 [Tdap])",
        "Grade 11",
        "Diptheria, Tetanus and acellular Pertussis / Diptheria, Pertussis and Tetanus / Tetanus, reduced Diptheria & reduced Pertussis",
        //OPV/IPV 18th
        "OPV/IPV (Dose-1 [IPV])",
        "2 months",
        "Oral Pollivirus Vaccine",
        //OPV/IPV 19th
        "OPV/IPV (Dose-2 [IPV])",
        "4 months",
        "Oral Pollivirus Vaccine",
        //OPV/IPV 20th
        "OPV/IPV (Dose-3 [OPV])",
        "6 months",
        "Oral Pollivirus Vaccine",
        //OPV/IPV 21th
        "OPV/IPV (Dose-4 [OPV])",
        "18 months",
        "Oral Pollivirus Vaccine",
        //OPV/IPV 22th
        "OPV/IPV (Dose-5 [OPV])",
        "Grade 1",
        "Oral Pollivirus Vaccine",
        //OPV/IPV 23th
        "OPV/IPV (Dose-6 [OPV])",
        "Grade 11",
        "Oral Pollivirus Vaccine",
        //PCV 24th
        "PCV (Dose-1)",
        "2 months",
        "Pneumococcal Conjugate Vaccine",
        //PCV 25th
        "PCV (Dose-2)",
        "4 months",
        "Pneumococcal Conjugate Vaccine",
        //PCV 26th
        "PCV (Dose-3)",
        "6 months",
        "Pneumococcal Conjugate Vaccine",
        //PCV 27th
        "PCV (Dose-4)",
        "18 months",
        "Pneumococcal Conjugate Vaccine",
        //MMR 28th
        "MMR (Dose-1)",
        "12 months",
        "Measles, Mumps and Rubella",
        //MMR 29th
        "MMR (Dose-2)",
        "Grade 1",
        "Measles, Mumps and Rubella",
        //30th
        "Varicella (Dose-1)",
        "12 months",
        "Varicella",
        //31th
        "Varicella (Dose-2)",
        "Grade 1",
        "Varicella",
        //32th
        "Rubella (Females)",
        "Grade 9",
        "Rubella",
        //33th
        "HPV (Females)",
        "Grade 11",
        "Human Papillomavirus",
      );
      return view ('docregform_vaccinedetails')
        ->with('current_doc_id', $current_doc_id)
        ->with('vdetails', $vdetails);
    }

    public function doctorvaccinestore (Request $request) {
      for ($i = 0; $i < $request->tot_length; $i++) {
        $vaccine = new Vaccine;
        $vaccine->vname = $request->vname[$i];
        $vaccine->vtiming = $request->vtiming[$i];
        $vaccine->doc_id = $request->doc_id;
        $vaccine->vdescription = $request->vdescription[$i];
        $vaccine->save();
      }
      $current_doc_id = $request->doc_id;
      return $this->show ($current_doc_id);
      //return view ('docregform_vaccinedetails')->with('current_doc_id', $current_doc_id);
    }
}
