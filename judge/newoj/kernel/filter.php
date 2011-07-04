<?php
/*
	代码过滤器
	添加输入暂停
*/
function addpauser_pas($code)
{
	$e=0;
	$com=0;
	$ins=false;
	$pos=0;
	$yy=0;
	for ($i=strlen($code)-1;$i>=0;$i--)
	{
	
		$zs=substr($code,$i,1);
		if ($zs=="'" && $com==0)
			$yy=!$yy;
		
		if ($yy)
		{
			continue;
		}
		
		$zs=strtolower(substr($code,$i,1));
		if ($zs=="}")
			$com++;
		if ($zs=="{")
			$com--;
		
		$zs=strtolower(substr($code,$i,2));
		if ($zs=="//")
		{
			for ($j=$i;$j<=strlen($code)-1;$j++)
			{
				$zs=substr($code,$j,1);
				if ($zs=="\n")
					break;
				$end=strtolower(substr($code,$j,3));
				if ($end=="end")
				{
					$e--;
					if ($e==0)
						$ins=false;
				}
				$end=strtolower(substr($code,$j,5));
				if ($end=="begin")
				{
					$e++;
					if ($e==0)
						$ins=false;
				}
			}
		}
		
		$end=strtolower(substr($code,$i,3));
		if ($end=="end" && $com==0)
		{
			$e++;
			$ins=true;
		}
		$begin=strtolower(substr($code,$i,4));
		if ($begin=="case" && $com==0)
		{
			$e--;
			if ($e==0)
				$ins=false;
		}
		$begin=strtolower(substr($code,$i,5));
		if ($begin=="begin" && $com==0)
			$e--;
		if ($ins && $e==0)
		{
			$pos=$i;
			break;
		}
	}
	$pos+=5;
	$part=substr($code,0,$pos);
	$pc=$part . "  while (eof(input)) do  ;";
	$pc.=substr($code,$pos);
	return $pc;
}

function addpauser_c($code)
{
	$com=0;
	$yy=0;
	$pos=0;
	for ($i=0;$i<=strlen($code)-1;$i++)
	{
		$zs=substr($code,$i,2);
		if ($zs=='\"' && $com==0)
		{
			$i++;
			continue;
		}
		$zs=substr($code,$i,1);
		if ($zs=='"' && $com==0)
			$yy=!$yy;
		
		if ($yy)
		{
			continue;
		}
		
		$zs=substr($code,$i,2);
		if ($zs=='/*')
			$com++;
		if ($zs=='*/')
			$com--;
		if ($zs=='//')
		{
			for (;$i<=strlen($code)-1;$i++)
			{
				$zs=substr($code,$i,1);
				if ($zs=="\n")
					break;
			}
		}
		$main=substr($code,$i,5);
		if ($main==" main" || $main=="	main" || $main=="\nmain" && $com==0)
		{
			$pos=$i;
			break;
		}
	}
	for (;$i<=strlen($code)-1;$i++)
	{
		$zs=substr($code,$i,2);
		if ($zs=='/*')
			$com++;
		if ($zs=='*/')
			$com--;
		if ($zs=='//')
		{
			for (;$i<=strlen($code)-1;$i++)
			{
				$zs=substr($code,$i,1);
				if ($zs=="\n")
					break;
			}
		}
		$main=substr($code,$i,1);
		if ($main=="{" && $com==0)
		{
			$pos=$i;
			break;
		}
	}
	$pos+=2;
	$part=substr($code,0,$pos);
	$pc=$part . " getchar(); ";
	$pc.=substr($code,$pos);
	return $pc;
}

function filter(&$code,$lang)
{
	$banlist=array("fork","socket","exec","system","pipe");
	$banlist_pas=array('{$','inline',"'/tmp");
	$banlist_c=array('"/tmp');
	foreach ($banlist as $p=>$v)
	{
		if (!(strpos($code,$v)===false))
			return $v;
	}
	if ($lang=='pas')
	{
		foreach ($banlist_pas as $p=>$v)
		{
			if (!(strpos($code,$v)===false))
				return $v;
		}
		$code=addpauser_pas($code);
	}
	else
	{
		foreach ($banlist_c as $p=>$v)
		{
			if (!(strpos($code,$v)===false))
				return $v;
		}
		$code=addpauser_c($code);
	}
	return "";
}
?>