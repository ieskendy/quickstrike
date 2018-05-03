<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = [
    	'id',
    	'style_name',
    	'description'
    ];

    public function createNewStyle($data)
    {
    	$this->fill($data);
    	if ($this->save()) {
    		return TRUE;
    	}

    	return FALSE;
    }

    public function getAllStyle($pagination = 5)
    {
    	$parts = $this->paginate($pagination);
    	return $parts;
    }

    public function pluckStyles()
    {
        $styles = $this->pluck('style_name', 'id');
        return $styles;
    }

    public function findStyle($id)
    {
    	$part = $this->find($id);
    	return $part;
    }

    public function updateStyle($id, $data)
    {
    	$part = $this->find($id);
    	
    	if ($part->update($data)) {
    		return $part;
    	}

    	return FALSE;
    }

    public function deleteStyle($id)
    {
    	$part = $this->find($id);
    	if ($part->delete()) {
    		return TRUE;
    	}

    	return FALSE;
    }

    public function parts()
    {
        return $this->hasMany('App\Part');
    }
}
