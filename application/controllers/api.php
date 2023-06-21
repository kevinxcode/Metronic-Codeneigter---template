<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Costcenter extends CI_Controller
{

    function savePerson()
    {
        $global_id = $this->input->post('global_id');
        $emp_id = $this->input->post('emp_id');
        $first_name = $this->input->post('first_name');
        $mid_name = $this->input->post('mid_name');
        $last_name = $this->input->post('last_name');
        $birth_name = $this->input->post('birth_name');
        $pob = $this->input->post('pob');
        $dob = $this->input->post('dob');
        $gender = $this->input->post('gender');
        $maiden = $this->input->post('maiden',);
        $person_company = $this->input->post('person_company');

        $data = array(
            'global_id' => $global_id,
            'emp_id' => $emp_id,
            'first_name' => $first_name,
            'mid_name' => $mid_name,
            'last_name' => $last_name,
            'birth_name' => $birth_name,
            'pob' => $pob,
            'dob' => $dob,
            'gender' => $gender,
            'maiden' => $maiden,
            'person_company' => $person_company,
        );
    }

    function saveJabatan()
    {
        $id = $this->input->post('id');
        $jab_code = $this->input->post('jab_code');
        $jab_label = $this->input->post('jab_label');
        $jab_remark = $this->input->post('jab_remark');
        $jab_company = $this->input->post('jab_company');
        $dept_id = $this->input->post('dept_id');

        $data = array(
            'id' => $id,
            'jab_code' => $jab_code,
            'jab_label' => $jab_label,
            'jab_remark' => $jab_remark,
            'jab_company' => $jab_company,
            'dept_id' => $dept_id,

        );
    }

    function saveDept()
    {
        $id = $this->input->post('id');
        $code = $this->input->post('code');
        $label = $this->input->post('label');
        $remark = $this->input->post('remark');
        $company = $this->input->post('company');

        $data = array(
            'id' => $id,
            'code' => $code,
            'label' => $label,
            'remark' => $remark,
            'company' => $company,
        );
    }

    function saveCost()
    {
        $id = $this->input->post('id');
        $cost_code = $this->input->post('cost_code');
        $cost_label = $this->input->post('cost_label');
        $cost_company = $this->input->post('cost_company');

        $data = array(
            'id' => $id,
            'cost_code' => $cost_code,
            'cost_label' => $cost_label,
            'cost_company' => $cost_company,
        );
    }

    function saveGrade()
    {
        $id = $this->input->post('id');
        $grade_code = $this->input->post('grade_code');
        $grade_rank = $this->input->post('grade_rank');
        $grade_remark = $this->input->post('grade_remark');
        $grade_company = $this->input->post('grade_company');

        $data = array(
            'id' => $id,
            'grade_code' => $grade_code,
            'grade_rank' => $grade_rank,
            'grade_remark' => $grade_remark,
            'grade_company' => $grade_company,
        );
    }

    function saveEducation()
    {
        $label = $this->input->post('grade_code');
        $rank = $this->input->post('grade_rank');

        $data = array(
            'label' => $label,
            'rank' => $rank,
        );
    }
}
