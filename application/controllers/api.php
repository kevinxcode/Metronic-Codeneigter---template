<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Costcenter extends CI_Controller
{

    function savePerson()
    {
        $global_id = $this->input->post('global_id', TRUE);
        $emp_id = $this->input->post('emp_id', TRUE);
        $first_name = $this->input->post('first_name', TRUE);
        $mid_name = $this->input->post('mid_name', TRUE);
        $last_name = $this->input->post('last_name', TRUE);
        $birth_name = $this->input->post('birth_name', TRUE);
        $pob = $this->input->post('pob', TRUE);
        $dob = $this->input->post('dob', TRUE);
        $gender = $this->input->post('gender', TRUE);
        $maiden = $this->input->post('maiden', TRUE);
        $person_company = $this->input->post('person_company', TRUE);

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
        $id = $this->input->post('id', TRUE);
        $jab_code = $this->input->post('jab_code', TRUE);
        $jab_label = $this->input->post('jab_label', TRUE);
        $jab_remark = $this->input->post('jab_remark', TRUE);
        $jab_company = $this->input->post('jab_company', TRUE);
        $dept_id = $this->input->post('dept_id', TRUE);

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
        $id = $this->input->post('id', TRUE);
        $code = $this->input->post('code', TRUE);
        $label = $this->input->post('label', TRUE);
        $remark = $this->input->post('remark', TRUE);
        $company = $this->input->post('company', TRUE);

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
        $id = $this->input->post('id', TRUE);
        $cost_code = $this->input->post('cost_code', TRUE);
        $cost_label = $this->input->post('cost_label', TRUE);
        $cost_company = $this->input->post('cost_company', TRUE);

        $data = array(
            'id' => $id,
            'cost_code' => $cost_code,
            'cost_label' => $cost_label,
            'cost_company' => $cost_company,
        );
    }

    function saveGrade()
    {
        $id = $this->input->post('id', TRUE);
        $grade_code = $this->input->post('grade_code', TRUE);
        $grade_rank = $this->input->post('grade_rank', TRUE);
        $grade_remark = $this->input->post('grade_remark', TRUE);
        $grade_company = $this->input->post('grade_company', TRUE);

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
        $label = $this->input->post('grade_code', TRUE);
        $rank = $this->input->post('grade_rank', TRUE);

        $data = array(
            'label' => $label,
            'rank' => $rank,
        );
    }
}
