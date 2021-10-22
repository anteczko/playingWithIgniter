<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id','nick','password','comment'];

	public function getUsers($id = false)
	{
	    if ($id === false) {
            return $this->findAll();
	    }

	    return $this->asArray()
			->where("id",$id)
			->first();
	}

    public function ifExists($nick)
    {
		//echo "Arg specified $nick";
        $query = $this->query("select nick from users where nick = '".$nick."' limit 1");
		$result = $query->getNumRows();
        return $result;
    }
	public function validateCridentials($nick,$password)
	{
        $query = $this->query("select * from users where nick = '".$nick."' limit 1");

		if(! $this->ifExists($nick) ){
			echo view('olx/errorUserNotExists');
		}
		else
		{
			if($query->getRow()->password == $password)
			{
				return true;
			}
		}
		return false;
	}
	public function getSession()
	{
		$session = \Config\Services::session();
		return $session;
	}
    public function setSession($nick)
    {
        $session = \Config\Services::session();
        $session->set('nick',$nick);
    }
	public function deleteSession()
	{
		$session = \Config\Services::session();
		$session->remove('nick');
	}
	
	public function testing()
	{
		$query = $this->query('select * from users');
		$results=$query->getResult();

		foreach($results as $row)
		{
			echo "$row->nick<br>";
		}
		echo 'Total results '.count($results).'<br>';


		$builder = $this->table('users');
		foreach($builder->get()->getResult() as $row){
			echo $row->nick;
		}

		$data = [
			'nick' => 'nowy',
			'password' => 'nowy'
		];

		//$this->table('users')->insert($data);
		foreach($this->table('users')->get()->getResultArray() as $row){
			echo $row['nick']."<br>";
			echo $row['password']."<br>";
		}
		echo "+---------------------------------+<br>";
		foreach($this->table('users')->get()->getResult() as $row){
			var_dump($row);
			echo $row->nick;
			echo "<br>";
		}

		var_dump($this->table('users')->like('nick','asd')->countAllResults());

		$builder=$this->table('users');
		foreach($builder->getWhere(['nick'=>'asd'])->getResult() as $row){
			echo $row->nick."<br>";
			echo $row->password."<br>";
		}
		echo "------------------------</br>";

		//$builder=$this->table('users');

		foreach($builder->getWhere(['password'=>'asd'])->getResult() as $row){
			echo $row->nick."<br>";
			echo $row->password."<br>";
		}
		echo "------------------------</br>";

		var_dump($builder->get());

		$builder=$this->table('users')->where('password','e')->get();
		foreach($builder->getResult() as $row){
			echo $row->nick."<br>";
			echo $row->password."<br>";
		}

		echo "+++++++++++++++++++++++++++++++++</br>";
		$builder=$this->table('users');
		$builder->where('password','asd')->where('nick','asd');
		var_dump($builder->get()->getResult());

		
		$builder=$this->table('users');

	}
}
?>