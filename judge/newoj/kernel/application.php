<?php
class Application
{
	private $dir,$cache;
	public function rp($handle)
	{
		$contents = "";
		do {
			$data = fread($handle, 8192);
			if (strlen($data) == 0)	break;
			$contents .= $data;
		} while(true);
		return $contents;
	}
	public function rf($file)
	{
		$handle=fopen($file,"r");
		$contents=$this->rp($handle);
		fclose($handle);
		return $contents;
	}
	public function wf($file,$contents)
	{
		$handle=fopen($file,"w");
		fwrite($handle,$contents);
		fclose($handle);
	}
	public function __construct($dir)
	{
		$this->dir=$dir;
		$this->cache=array();
	}
	public function Get($varname)
	{
		if (isset($this->cache[$varname]))
			return $this->cache[$varname];
		$path=$this->dir.$varname;
		if (file_exists($path))
			$contents=$this->rf($path);
		else
		{
			$this->wf($path,"");
			$contents="";
		}
		if (substr($contents,strlen($contents)-1)=="\n")
		{
			$contents=substr($contents,0,strlen($contents)-1);
			$this->Set($varname,$contents);
		}
		$this->cache[$varname]=$contents;
		return $contents;
	}
	public function Set($varname,$contents)
	{
		$path=$this->dir.$varname;
		$this->wf($path,$contents);
		$this->cache[$varname]=$contents;
	}
};
?>