<?php
function console_log($data)  //调试输出用函数
{
	if (is_array($data) || is_object($data))
	{
		echo("<script>console.log(".json_encode($data).");</script>");
	}
	else
	{
		echo("<script>console.log(".$data.");</script>");
	}
}