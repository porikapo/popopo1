<html>

<!-�^�C�g��������->
<head>
<title>��ǔL���L</title>
</head>

<!-���o��������->
<h1>��ǔL���L</h1>

<!-���̓t�H�[�����쐬����->
	<form method="post" action ="#">
	���O�F  
	<input type ="text" name ="name"></br>
	�R�����g�F
	<input type ="text" name ="comment"></br>
	���M�p�X���[�h:
 	<input type = "text" name ="pass" size ="2"/><br/>
	<input type ="submit"name="input" value ="���M"></br>
	�폜�ԍ�:
	<input type ="text" name="del">
	�p�X:
 	<input type = "text" name ="dpass" size ="2"/>
	<input type ="submit"name="delete" value ="�폜"></br>
	</form>

<?php
//���̓f�[�^��php�Ŏ󂯎��
	$name=$_POST['name'];
	$comment=$_POST['comment'];
	$del=$_POST['del'];
	$pass=$_POST["pass"];
	$dpass=$_POST["dpass"];

//�e�L�X�g�t�@�C������ϐ�$filename�ɑ������
	$filename='mission_2-5.txt';


//���͓���������
	$time=date("Y/m/d/H:i:s");

//���e�ԍ�������
	//�J�E���g�p�t�@�C�����J��
	$fp2=fopen('./count.txt','r');
	//1�s�ڂ𕶎��Ƃ��ēǂݎ��
	$count_text=fgets($fp2);
	fclose($fp2);

	//�������int(����)�^�ɕϊ�
	$count = (int)$count_text;
	$count+=1;

	//�J�E���g�p�t�@�C������ɂ��ĊJ��
	$fp2=fopen('./count.txt','w');
	//�V�������l����������
	fwrite($fp2,$count);
	fclose($fp2);

//���̓f�[�^��\��
		$fp=fopen('mission_2-5.txt','a');

		if(!empty($comment)){
		fwrite($fp,$count.'<>'.$name.'<>'.$comment.'<>'.$time.'<>'.$pass."<>\n");
		}
		fclose($fp);


//�w�肵���ԍ��̓��e���폜����
	//1�s���̔z��
		$filedate=file( $filename );
	//���e�������ĊJ��
		$fp=fopen('mission_2-5.txt','w+');
	//�z�񂩂�1�����o��
		foreach($filedate as $line){
       
        	//<>�Ő؂��Ĕz��ɂ���
		$date=explode('<>',$line);

		//���M�p�X�ƍ폜�p�X����v�����A�u$del�ƈႤ�v�Ƃ��Ɋ��ʓ�������
		if($dpass!=$date[4]||$date[0]!=$del){
			//�t�@�C���ɒǋL
			fputs($fp,$line);
		}
		}
	//�t�@�C�������
		fclose($fp);
?>

<?PHP
//�ҏW�@�\��t����
	//���̓f�[�^��php�Ŏ󂯎��
		$hen=$_POST['hen'];
	//1�s���̔z��
		$filedate=file( $filename );

	//�z�񂩂�1�����o��
		foreach($filedate as $line){
       
        	//<>�Ő؂��Ĕz��ɂ���
		$date=explode('<>',$line);

		//�u$hen�Ɠ����v�Ƃ��Ɋ��ʓ�������
		if($date[0]==$hen){
			$edit_num=$date[0];
		
			$user=$date[1];
		
			$text=$date[2];
		}
		}	

?>
<!-�ҏW�t�H�[�����쐬����->
	<form action="#" method="post">
	�ҏW�ԍ�:<input type ="text" name="hen">
	�p�X:
	<input type = "text" name ="hpass" size ="2"/>
 	<input type ="submit"name="henshu" value ="�ҏW�ԍ�">
	</form>

	<form action="#" method="post">
	<input name="edit_num" type ="hidden" value ="<?PHP echo $edit_num;?>"/></br>
	���O:<input name="user" type ="text" value ="<?PHP echo $user;?>"/>
	�R�����g:<input name="text" type ="text" value ="<?PHP echo $text;?>"/>
	<input type="submit"name="kaihen" value ="�ҏW">
	</form>
<?PHP
//���̓f�[�^��php�Ŏ󂯎��
	$hen=$_POST['hen'];
	$edit_num=$_POST['edit_num'];
	$user=$_POST['user'];
	$text=$_POST['text'];
	$hpass = $_POST["hpass"];

//��s���z��ɓ����
	$filedate  = file('mission_2-5.txt');

//���e�������ĊJ��
	$fp=fopen('mission_2-5.txt','w+');

//�z�񂩂�ЂƂÂ��o��
foreach($filedate  as $line){
	
	// �z������Ԃɕ\������
	//<>�Ő؂��Ĕz��ɂ���
		$date=explode('<>',$line);
	//�f�o�b�N�̈�
		//echo"check_ifl|".$date[0]."|".$edit_num."|<hr>";

	//���e�ԍ��ƕҏW�ԍ��A���M�p�X�ƕҏW�p�X�������Ȃ犇�ʂ̒�����
		if($hpass==$date[4]&&$date[0]==$edit_num){
			$text=$date[0].'<>'.$user.'<>'.$text.'<>'.$time."\n";

			//�ҏW������s���t�@�C���ɒǋL
			fputs($fp,$text);

	//��v���Ȃ��Ƃ��͌��̃f�[�^�����̂܂܏�������
		//���̈�s���t�@�C���ɒǋL
		}else{
			fputs($fp,$line);
		}
}
//�t�@�C�������
	fclose($fp);
?>
<?PHP
// �ǂݍ��ރt�@�C�����̎w��
	$file_name = "mission_2-5.txt";
	
// �t�@�C����S�Ĕz��ɓ����
	$filedate = file( $file_name );

	// �擾�����t�@�C���f�[�^(�z��)��S�ĕ\������
	//�z�񂩂�ЂƂÂ��o��
		foreach($filedate as $line){
	// �z������Ԃɕ\������
		//<>�Ő؂��Ĕz��ɂ���
			$filedate=explode('<>',$line);
		//���e�ԍ�
			echo'�ԍ�:'.$filedate[0].'<br />'; 
		//�R�����g
			echo $filedate[2].'<br />';
		//���O
			echo'By:'.$filedate[1].'<br />';
		//���e����
			echo'���e����:'.$filedate[3].'<br />';
		//��؂�
			echo'<hr/>';
		}
?>

</html>