<?php

class Salary_model extends CI_Model {

	var $data;
	
	function get_all_data()
	{
		$query = $this->db->get("employment_salary");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_all_component()
	{
		$query = $this->db->get("salary");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_all_submission_active(){
		$this->db->where('approve','1');
		$query = $this->db->get("salary_submission");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_all_submission(){
		$this->db->select('s.*, a.acc_direktur, a.acc_manager');
		$this->db->from('salary_submission s');
		$this->db->join('salary_submission_approve a', 's.id = a.submission_id', 'INNER');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	function get_all_submission_draft(){
		$data = array();
		if ($this->salary_model->get_id_approve_by_subm_id()){
			$emp_data = $this->salary_model->get_id_approve_by_subm_id();
			foreach ($emp_data as $row)
			{
				array_push($data, $row->submission_id);
			}
		}
		$this->db->from('salary_submission');
		$this->db->where('approve','0');
		if ($data){
			$this->db->where_not_in('id',$data);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	// ambil submission approve id berdasarkan submission id
	function get_id_approve_by_subm_id(){
		$this->db->select('sa.submission_id');
		$this->db->from('salary_submission_approve sa');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_component_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get('salary');
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_submission_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get('salary_submission');
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_pot_bln($emp, $bln){
		$this->db->select('s.*');
		$this->db->from('salary_record_employment s');
		$this->db->where('s.masa_kerja',$bln);
		$this->db->where('s.emp_id',$emp);
		$this->db->join('salary_submission a', 'a.id = s.submission_id', 'INNER');
		$this->db->where('a.approve','1');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result->pot_training;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_all_salary_data(){
		$this->db->select('e.fname,e.lname,e.nik,e.id, d.name AS department, e.bank, e.rekening, jt.name AS jabatan, j.start_contract');
		$this->db->from('employment e');
		$this->db->join('employment_job j', 'e.id = j.emp_id', 'INNER');
		$this->db->join('department d', 'j.department = d.id', 'INNER');
		$this->db->join('job_title jt', 'j.job_title = jt.id', 'INNER');
		$this->db->where('e.active','1');
		$this->db->order_by("e.fname", "DESC"); 
		//$this->db->join('employment_salary es', 'e.id = es.emp_id', 'LEFT');
		//$this->db->join('salary s', 'es.component_id = s.id', 'LEFT');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_kasbon_by_emp($emp){
		$this->db->select('k.*');
		$this->db->from('kasbon k');
		$this->db->join('employment e', 'k.emp_id = e.id', 'INNER');
		$this->db->where('k.emp_id',$emp);
		$this->db->where('k.status','0');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_allsalary_by_emp($id)
	{
		$this->db->select('a.*, b.id AS comp_id, b.name');
		$this->db->from('employment_salary a');
		$this->db->join('salary b', 'a.component_id = b.id', 'INNER');
		$this->db->where('a.emp_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_salary_emp_by_sub($sub,$id){
		$this->db->select('e.*,e.id AS rec_id,s.*, em.marital');
		$this->db->from('salary_record_employment e');
		$this->db->where('e.submission_id',$sub);
		$this->db->where('e.id',$id);
		//$this->db->join('salary_record_component c', 'e.id = c.record_id', 'INNER');
		$this->db->join('salary_submission s', 'e.submission_id = s.id', 'INNER');
		$this->db->join('employment em', 'e.emp_id = em.id', 'INNER');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_salary_submission_data_by_submission($id){
		
		$data = array();
		if ($this->salary_model->get_id_emp_by_subm_id($id)){
			$emp_data = $this->salary_model->get_id_emp_by_subm_id($id);
			foreach ($emp_data as $row)
				{
						array_push($data, $row->emp_id);
				}
		}
		$this->db->select('e.fname,e.lname,e.nik,e.id, d.name AS department, e.bank, e.rekening, jt.name AS jabatan, j.start_contract');
		$this->db->from('employment e');
		$this->db->join('employment_job j', 'e.id = j.emp_id', 'INNER');
		$this->db->join('department d', 'j.department = d.id', 'INNER');
		$this->db->join('job_title jt', 'j.job_title = jt.id', 'INNER');
		
		//$this->db->join('salary_record_employment se', 'se.emp_id = e.id', 'RIGHT');
		//$this->db->where('se.submission_id',$id);
		$this->db->where('e.active','1');
		$this->db->order_by('e.fname', 'asc');
		if ($data){
			$this->db->where_not_in('e.id',$data);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	// ambil emp id berdasarkan submission id
	function get_id_emp_by_subm_id($id){
		$this->db->select('se.emp_id');
		$this->db->from('salary_record_employment se');
		$this->db->where('se.submission_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_all_salary_subm_by_id($id){
		$this->db->select('e.*');
		$this->db->from('salary_record_employment e');
		//$this->db->join('salary jt', 'j.job_title = jt.id', 'INNER');
		$this->db->where('e.submission_id',$id);
		$this->db->order_by('e.emp_name', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_all_angsuran_by_subm($id){
		$this->db->select('e.*');
		$this->db->from('salary_record_employment e');
		//$this->db->join('salary jt', 'j.job_title = jt.id', 'INNER');
		$this->db->where('e.submission_id',$id);
		$this->db->where('e.angsuran !=',0);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_data_by_id($id)
	{
		$this->db->select('es.*, s.name');
		$this->db->from('employment_salary es');
		$this->db->join('salary s', 'es.component_id = s.id', 'INNER');
		$this->db->where('es.id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}	
	}
	
	function get_salary_by_id($id,$name)
	{
		$this->db->select('es.*');
		$this->db->from('employment_salary es');
		$this->db->join('salary s', 'es.component_id = s.id', 'INNER');
		$this->db->where('es.emp_id', $id);
		$this->db->where('s.id', $name);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result->amount;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_job_by_id($id,$name)
	{
		$this->db->select('es.*');
		$this->db->from('employment_job es');
		$this->db->join('job_title s', 'es.job_title = s.id', 'INNER');
		$this->db->where('es.emp_id', $id);
		$this->db->where('s.id', $name);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result->amount;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_salary_submission_by_id($subm_id,$id,$name)
	{
		$this->db->where('record_id', $id);
		$this->db->where('submission_id', $subm_id);
		$this->db->where('component_id', $name);
		$query = $this->db->get('salary_record_component');

		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result->amount;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_all_groups()
	{
		$query = $this->db->get('salary');
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$kelompok_akun[$row->id] = $row->name;
			}
			return $kelompok_akun;
		}
		else
		{
			return FALSE;
		}
	}

	function fill_data()
	{
		$this->data = array(
			'emp_id' => $this->input->post('emp_id'),
			'component_id' => $this->input->post('component'),
			'amount' => $this->input->post('amount'),
			'note_salary' => $this->input->post('note')
		);
	}
	
	function fill_component()
	{
		$this->data = array(
			'name' => $this->input->post('name'),
			'amount' => $this->input->post('amount'),
			'note_component' => $this->input->post('note_component')
		);
	}
	
	function fill_submission()
	{
		$this->data = array(
			'name' => $this->input->post('name'),
			'date_salary' => $this->input->post('date_salary'),
			'note' => $this->input->post('note')
		);
	}
	function fill_submission_record($emp_id, $emp_fname, $emp_lname, $subm_id, $nik, $department, $jabatan, $gaji_total, $gaji_tdk_uang, $gaji_uang, $pot_training, $gaji_terima, $masa_kerja, $bank, $rekening, $bln4, $angsuran)
	{
		$this->data = array(
			'emp_id' => $emp_id,
			'emp_name' => $emp_fname.' '.$emp_lname,
			'department' => $department,
			'jabatan' => $jabatan,
			'nik' => $nik,
			'submission_id' => $subm_id,
			'masa_kerja' => $masa_kerja,
			'bank' => $bank,
			'rekening' => $rekening,
			'gaji_total' => $gaji_total,
			'gaji_tdk_uang' => $gaji_tdk_uang,
			'pot_training' => $pot_training,
			'gaji_terima' => $gaji_terima,
			'gaji_uang' => $gaji_uang,
			'gaji_bln4' => $bln4,
			'angsuran' => $angsuran,
		);
	}
	function fill_submission_component( $comp_name, $comp_id, $comp_amount , $comp_note, $subm_id, $record_id )
	{
		$this->data = array(
			'component_id' => $comp_id,
			'component_name' => $comp_name,
			'amount' => $comp_amount,
			'note' => $comp_note,
			'record_id' => $record_id,
			'submission_id' => $subm_id,
		);
	}
	function insert_submission_approve($id){
		$this->data = array(
				'submission_id' => $id,
			);
		// menambah satu record pada table salary_submission_approve dimana acc manager true atau 1
		$insert = $this->db->insert('salary_submission_approve', $this->data);
		return $insert;
	}
	// simpan ACC pejabat bersangkutan
	function agree_submission($jabatan,$id)
	{
		if ($jabatan == 'manager'){
			$this->data = array(
				'acc_manager' => '1',
			);
			$this->db->where('submission_id', $id);
			// ubah status acc direktur menjadi true atau 1
			$this->db->update('salary_submission_approve', $this->data);
			return TRUE;
		}else if ($jabatan == 'direktur'){
			// cek approve
			if ($this->cek_submission_approval($id)){
				$this->employment = array(
				'approve' => '1',
				);
				$this->db->where('id', $id);
				// ubah status approve pada table salary submission
				$employment = $this->db->update('salary_submission', $this->employment);
				
				$this->data = array(
					'acc_direktur' => '1',
				);
				$this->db->where('submission_id', $id);
				// ubah status acc direktur menjadi true atau 1
				$this->db->update('salary_submission_approve', $this->data);
				return TRUE;
			}else {
				return FALSE;
			}
		}else {
			return FALSE;
		}
	}
	
	function cek_submission_approval($id){
		$this->db->where('id', $id);
		$this->db->where('approve', '1');
		$query = $this->db->get('salary_submission');
		if ($query->num_rows() > 0)
		{
			//$result = $query->row();
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function cek_manager_approval($id){
		$this->db->where('id', $id);
		$this->db->where('acc_manager', '1');
		$query = $this->db->get('salary_submission_approve');
		if ($query->num_rows() > 0)
		{
			//$result = $query->row();
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function roolback_approval($id){
		$this->employment = array(
				'approve' => '0',
		);
		$this->db->where('id', $id);
		// ubah status approve pada table salary submission
		$employment = $this->db->update('salary_submission', $this->employment);
			
		$this->data = array(
			'acc_direktur' => '0',
		);
		$this->db->where('submission_id', $id);
		// ubah status acc direktur menjadi true atau 1
		$this->db->update('salary_submission_approve', $this->data);
		return true;
	}
	//Check for duplicate name
	function check_component()
	{
		$this->db->where('name', $this->data['name']);
		$query = $this->db->get('salary');

		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	//Check for duplicate salary employment
	function check_component_salary()
	{
		$this->db->where('component_id', $this->data['component_id']);
		$this->db->where('emp_id', $this->data['emp_id']);
		$query = $this->db->get('employment_salary');

		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	//Check for duplicate salary employment
	function check_date_submission()
	{
		//$this->db->where(month('date_salary'), month($this->data['date_salary']));
		//$query = $this->db->get('salary_submission');
		$tgl = new DateTime($this->data['date_salary']);	
		$pengajuan =  $tgl->format('m');
		$query = $this->db->query("SELECT * FROM salary_submission WHERE MONTH(date_salary) = '$pengajuan' ");
		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	//Check for duplicate login ID
	function check_name($id = '')
	{
		$this->db->where('name', $this->data['name']);
		if($id != '') $this->db->where('id !=', $id);
		$query = $this->db->get('salary');

		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	// cari jumlah total dari table_name
	function get_jumlah_gaji_by_component($subm_id,$comp_id){
		$this->db->select_sum('amount');
		$this->db->where('component_id', $comp_id);
		$this->db->where('submission_id', $subm_id);
		$query = $this->db->get('salary_record_component');
		
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result->amount;
		}
		else
		{
			return FALSE;
		}
	} 
	
	// insert component salary
	function insert_data()
	{
		$insert = $this->db->insert('employment_salary', $this->data);
		return $insert;
	}
	// insert component salary
	function insert_component()
	{
		$insert = $this->db->insert('salary', $this->data);
		return $insert;
	}
	
	// simpan pengajuan
	function insert_submission()
	{
		$insert = $this->db->insert('salary_submission', $this->data);
		return $insert;
	}
	// simpan data karyawan dalam pengajuan gaji
	function insert_submission_record($data)
	{
		$insert = $this->db->insert('salary_record_employment', $data);
		return $insert;
	}
	// tambah komponen dalam pengajuan gaji
	function insert_submission_component()
	{
		$insert = $this->db->insert('salary_record_component', $this->data);
		return $insert;
	}
	function update_data($id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('salary', $this->data);
		return $update;
	}
	function update_salary($id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('employment_salary', $this->data);
		return $update;
	}
	//delete submission atau pengajuan gaji
	function delete_submission($id){
		$this->db->where('id', $id);
		$delete = $this->db->delete('salary_submission');
		return $delete;
	}
	
	//delete component salary
	function delete_component($id){
		$this->db->where('id', $id);
		$delete = $this->db->delete('salary');
		return $delete;
	}
	
	function delete_salary($id){
		$this->db->where('id', $id);
		$delete = $this->db->delete('employment_salary');
		return $delete;
	}
	
	function delete_checked($checked_messages = array()) 
	{
		$this->db->where_in('id', $checked_messages);
		$delete = $this->db->delete('salary_submission');
		//echo $checked_messages;
		return $delete;
	}
	
	function delete_salary_record_employment($checked_messages = array()){
		$this->db->where_in('id', $checked_messages);
		$delete = $this->db->delete('salary_record_employment');
		//echo $checked_messages;
		return $delete;
	}
	
	function get_thr_by_emp_id($id){
		$this->db->select('e.fname,e.lname,e.nik,e.id, e.marital, d.name AS department, e.bank, e.rekening, jt.name AS jabatan, j.start_contract');
		$this->db->from('employment e');
		$this->db->join('employment_job j', 'e.id = j.emp_id', 'INNER');
		$this->db->join('department d', 'j.department = d.id', 'INNER');
		$this->db->join('job_title jt', 'j.job_title = jt.id', 'INNER');
		$this->db->where('e.active','1');
		$this->db->where('e.id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

}
/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
