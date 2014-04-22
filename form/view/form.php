<form method="post">

	<ul>
		<li><label to="name">NAME</label><input type=text name="name" value="<?= $_POST['name'] ? $_POST['name'] : ''; ?>" /></li>
		<li><label to="email">EMAIL</label><input type=text name="email" value="<?= $_POST['email'] ? $_POST['email'] : ''; ?>" /></li>
		<li><label to="subject">SUBJECT</label><input type=text name="subject" value="<?= $_POST['subject'] ? $_POST['subject'] : ''; ?>" /></li>
		<li><label to="content">CONTENT</label><textarea name="content"><?= $_POST['content'] ? $_POST['content'] : ''; ?></textarea></li>
		<li><input type="submit" value="SEND" /></li>
	</ul>

</form>