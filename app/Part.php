<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
    	'id',
    	'style_id',
    	'part_name',
    	'url'
    ];

    public function createNewPart($data)
    {
    	$this->fill($data);
    	if ($this->save()) {
    		return TRUE;
    	}

    	return FALSE;
    }

    public function getAllParts($pagination = 5)
    {
    	$parts = $this->paginate($pagination);
    	return $parts;
    }

    public function findPart($id)
    {
    	$part = $this->find($id);
    	return $part;
    }

    public function updatePart($id, $data)
    {
    	$part = $this->find($id);
    	
    	if ($part->update($data)) {
    		return $part;
    	}

    	return FALSE;
    }

    public function deletePart($id)
    {
    	$part = $this->find($id);
    	if ($part->delete()) {
    		return TRUE;
    	}

    	return FALSE;
    }
}
