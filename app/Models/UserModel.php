<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id','nick','pass','comment'];

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
		echo "Arg specified $nick";
        $query = $this->query("select nick from users where nick = '".$nick."' limit 1");
		$result = $query->getNumRows();
		var_dump($result);
        return $result;
    }
}
?>