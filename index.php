<?php include('./include/db.php') ?>

<?php include('./admin/function.php') ?>

<!DOCTYPE html>
<html lang="en">
<?php include('./include/header.php') ?>

<body>
	<div class="container">
		<!-- 导航条 -->
		<?php include('./include/navigation.php') ?>

		<div class="row">
			<div class="col-md-8">
				<?php
				/* 每页4个条目 */
				$per_page = 4;

				/* 判断 访问的参数 page 是否存在且不为空 */
				/* 一个url ？后面是要访问的东西  www.test.com?page=5&name=chang */
				if (isset($_GET['page'])) {
					$page = escape($_GET['page']);
				} else {
					$page = "";
				}

				/* $page == 1 $page是字符串被强制转换为 整数0  */
				// || 或
				if ($page == "" || $page == 1) {
					/* 第一页零条 */
					$page_1 = 0;
				} else {
					/* 第一页条目 */
					$page_1 = ($page * $per_page) - $per_page;
				}

				/* 用户角色存在，用户角色为管理员 */
				if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
					/* 在 posts表中 查询所有数据 */
					$post_query_count = "SELECT * FROM posts ";
				} else {
					/* 在 posts表中查询 post_status='published */
					$post_query_count = "SELECT * FROM posts WHERE post_status='published'";
				}


				/* 返回查询结果 */
				$find_count = mysqli_query($connection, $post_query_count);

				/* 查询结果计数 */
				$count = mysqli_num_rows($find_count);

				if ($count < 1) {
					echo "<h1 class='text-center'>帖子不存在<h1>";
				} else {
					/* ceil 四舍五入 */
					/* 总共需要多少页 */
					$count = ceil($count / $per_page);

					/* 所有帖子 限制范围在 $page ,$per_page; */
					$query = "SELECT * FROM posts LIMIT $page_1 ,$per_page";

					/* 返回查询结果 */
					$select_all_posts_query = mysqli_query($connection, $query);

					while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
						$post_id = escape($row['post_id']);
						$post_title = escape($row['post_title']);
						$post_author = escape($row['post_user']);
						$post_user = escape($row['post_user']);
						$post_date = escape($row['post_date']);
						$post_image = escape($row['post_image']);
						$post_content = substr(escape($row['post_content']), 0, 100);
						$post_status = escape($row['post_status']);
				?>

						<h1 class="page-header">
							帖子
						</h1>

						<!-- First Blog Post -->
						<h2>
							<a href="">标题连接</a>
						</h2>
						<p class="lead">
							by <a href="">段落连接</a>
						</p>
						<p>
							<span class="glyphicon glyphicon-time"></span>
							发布时间
						</p>
						<hr>

						<a href="">
							图片连接
							<img class="img-responsive" src="" alt="">
						</a>

						<hr>
						<p>帖子内容</p>
						<a class="btn btn-primary" href="">
							Read More <span class="glyphicon glyphicon-chevron-right"></span>
						</a>
						<hr>
				<?php
					}
				}
				?>

				<!-- 侧栏 -->
				<!--<?php include "includes/sidebar.php"; ?> -->
			</div>

			<!-- 分割线 -->
			<hr>

			<ul class="pager">

			</ul>

			<?php include './include/footer.php' ?>
		</div>

</body>

</html>
