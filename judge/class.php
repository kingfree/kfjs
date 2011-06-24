<?

class Judge {

public $jid, $pid, $cid, $uid, $langtype, $filename, $rundir, $datadir, $strat_num, $end_num, $pro_filename, $time_limit, $memory_limit;
public $result, $detail, $score, $runtime, $memory, $ip;

public function __construct($pid=-1, $cid=-1) {
}
	public function Get_Complie_CMD($filename, $outputdir, $langtype) {
	if($langtype==0)
		$s = "gcc \"{$filename}\" -lm -w -O2 -static -o \"{$outputdir}a.exe\" 2>&1";
	elseif($langtype==1)
		$s = "g++ \"{$filename}\" -lm -w -O2 -static -o \"{$outputdir}a.exe\" 2>&1";
	elseif($langtype==2)
		$s = "fpc \"{$filename}\" -So -XS -v0 -O1 -o\"{$outputdir}a.exe\" 2>&1";
	else
		$s = "chmod +rx \"{$filename}\" && cp \"{$filename}\" \"{$outputdir}a.exe\"";
	return($s);
}

}

?>
