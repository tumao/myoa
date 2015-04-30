<?php 
class Menu_catelogue extends Eloquent
{
	// 要操作的数据中的表
	protected $table = 'menu_catelogue';

	protected $fillable = array('name','icon','root','sort','path');

	public $timestamps = false;



}