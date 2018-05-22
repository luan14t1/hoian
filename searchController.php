<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php      
			$key = $_POST['key'];
            $sql = "SELECT * FROM new INNER JOIN category ON new.id_cat = category.id_cat INNER JOIN user ON new.id_user = user.id_user WHERE title LIKE '%{$key}%' or name LIKE '%{$key}%'";
            $query = $conn->query($sql);
            $data = "";
                while($arrNew = mysqli_fetch_assoc($query)){
                $id_new = $arrNew['id_new']; 
                $title = $arrNew['title'];                     
                $id_cat = $arrNew['id_cat']; 
                $picture = $arrNew['picture']; 
                $detail = $arrNew['detail']; 
                $name_cat = $arrNew['name'];                    
                $name_user = $arrNew['fullname'];
                $date = $arrNew['date'];
                $data .="<div class='col-md-4 col-xs-12'>
									<div class='item-mini'>
										<div class='img'>
											<a href='news.php?idNews={$id_new}' title='{$title}'>
												<img src='/hoian/uploads/images/news/{$picture}' title='{$title}'>
											</a>
										</div>
										<div class='desc'>
											<h2>
												<a href='news.php?idNews={$id_new}' title='{$title}'>$title</a>
											</h2>
										</div>
									</div>
								</div>
							</div>";
             }
                echo $data;
        ?>