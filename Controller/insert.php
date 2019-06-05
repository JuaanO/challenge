<?php

//insert.php

include('../Model/database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$first_name = '';
$last_name = '';
$identification = '';
$estado = '';
$birthDate = '';
$email = '';
$observation = '';
$DateEntry = '';
$position = '';
$departament = '';
$salary = '';
$parcial = '';

if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM tbl_sample WHERE id='".$form_data->id."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['first_name'] = $row['first_name'];
		$output['last_name'] = $row['last_name'];
		$output['identification'] = $row['identification'];
		$output['estado'] = $row['estado'];
		$output['birthDate'] = $row['birthDate'];
		$output['email'] = $row['email'];
		$output['observation'] = $row['observation'];
		$output['DateEntry'] = $row['DateEntry'];
		$output['position'] = $row['position'];
		$output['departament'] = $row['departament'];
		$output['salary'] = $row['salary'];
		$output['parcial'] = $row['parcial'];
	}
}
elseif($form_data->action == "Delete")
{
	$query = "
	DELETE FROM tbl_sample WHERE id='".$form_data->id."'
	";
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Data Deleted';
	}
}
else
{
	if(empty($form_data->first_name))
	{
		$error[] = 'First Name is Required';
	}
	else
	{
		$first_name = $form_data->first_name;
	}

	if(empty($form_data->last_name))
	{
		$error[] = 'Last Name is Required';
	}
	else
	{
		$last_name = $form_data->last_name;
	}
	
	if(empty($form_data->identification))
	{
		$error[] = 'identification is Required';
	}
	else
	{
		$identification = $form_data->identification;
	}
	//birthDate
		
	if(empty($form_data->birthDate))
	{
		$error[] = 'birthDate is Required';
	}
	else
	{
		$birthDate = $form_data->birthDate;
	}
	//email
	
	if(empty($form_data->email))
	{
		$error[] = 'email is Required';
	}
	else
	{
		$email = $form_data->email;
	}
	//observation

	if(empty($form_data->observation))
	{
		$error[] = 'observatcion is Required';
	}
	else
	{
		$observation = $form_data->observation;
	}
	//DateEntry

	if(empty($form_data->DateEntry))
	{
		$error[] = 'DateEntry is Required';
	}
	else
	{
		$DateEntry = $form_data->DateEntry;
	}
	//position

	if(empty($form_data->position))
	{
		$error[] = 'position is Required';
	}
	else
	{
		$position = $form_data->position;
	}
	//departament

	if(empty($form_data->departament))
	{
		$error[] = 'departament is Required';
	}
	else
	{
		$departament = $form_data->departament;
	}
	//departament

	if(empty($form_data->salary))
	{
		$error[] = 'salary is Required';
	}
	else
	{
		$salary = $form_data->salary;
	}

	//parcial

	if(empty($form_data->parcial))
	{
		$error[] = 'parcial is Required';
	}
	else
	{
		$parcial = $form_data->parcial;
	}

	if(empty($error))
	{
		if($form_data->action == 'Insert')
		{
			$data = array(
				':first_name'		=>	$first_name,
				':last_name'		=>	$last_name,
				':identification'	=>	$identification,
				':estado'			=>	$estado,
				':birthDate'		=>	$birthDate,
				':email'			=>	$email,
				':observation'		=>	$observation,
				':DateEntry'		=>	$DateEntry,
				':position'			=>	$position,
				':departament'		=>	$departament,
				':salary'			=>	$salary,
				':parcial'			=>	$parcial
			);
			$query = "
			INSERT INTO tbl_sample 
				(first_name, last_name, identification, estado, birthDate, email, observation,DateEntry,
				position, departament, salary, parcial) VALUES 
				(:first_name, :last_name, :identification, :estado, :birthDate, :email, :observation,:DateEntry,
				:position, :departament, :salary, :parcial)
			";
			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Data Inserted';
			}
		}
		if($form_data->action == 'Edit')
		{
			$data = array(
				':first_name'	=>	$first_name,
				':last_name'	=>	$last_name,
				':id'			=>	$form_data->id
			);
			$query = "
			UPDATE tbl_sample 
			SET first_name = :first_name, last_name = :last_name 
			WHERE id = :id
			";

			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Data Edited';
			}
		}
	}
	else
	{
		$validation_error = implode(", ", $error);
	}

	$output = array(
		'error'		=>	$validation_error,
		'message'	=>	$message
	);

}



echo json_encode($output);

?>