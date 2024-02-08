<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>

					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<style>
						.rounded-box {
							border-radius: 50%;
							padding: 20px;
							text-align: center;
							height: 200px;
							width: 200px;
							display: flex;
							align-items: center;
							justify-content: center;
							flex-direction: column;
						}
					</style>

					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-info rounded-box">
							<div class="inner">
								<?php
								require 'connectdb_dashboard.php';
								$currentYear = date('Y');
								$query = "select * from perkara where year(tanggal_pendaftaran)= '$currentYear'";
								$query_run = mysqli_query($connection, $query);
								$row = mysqli_num_rows($query_run);
								echo '<h3>' . $row . '</h3>Perkara';
								?>
								<p>Diterima</p>
							</div>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success rounded-box">
						<div class="inner">
							<?php
							//require 'connectdb_dashboard.php';
							$currentYear = date('Y');
							$query = "select * from perkara_putusan where year(tanggal_putusan)= '$currentYear'";

							$query_run = mysqli_query($connection, $query);
							//return $query->result();
							$row = mysqli_num_rows($query_run);
							echo '<h3>' . $row . '</h3>Perkara';
							?>
							<p>Putus</p>
						</div>

					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning rounded-box">
						<div class="inner">
							<?php
							//require 'connectdb_dashboard.php';
							$currentYear = date('Y');
							$query = "select * from perkara_putusan where year(tanggal_minutasi)= '$currentYear'";
							$query_run = mysqli_query($connection, $query);
							//return $query->result();
							$row = mysqli_num_rows($query_run);
							echo '<h3>' . $row . '</h3>Perkara';
							?>
							<p>Minutasi</p>
						</div>

					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger rounded-box">
						<div class="inner">
							<?php
							
							$currentYear = date('Y');
							$query = "select * from perkara
							      left join perkara_putusan on perkara.perkara_id = perkara_putusan.perkara_id
							      where tanggal_putusan is null and year(tanggal_pendaftaran)='$currentYear' ";


							$query_run = mysqli_query($connection, $query);
							//return $query->result();
							$row = mysqli_num_rows($query_run);
							echo '<h3>' . $row . '</h3>Perkara';
							?>
							<p>Sisa</p>
						</div>

					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-primary rounded-box">
						<div class="inner">
							<?php
							//require 'connectdb_dashboard.php';
							$currentYear = date('Y');
							$currentMonth = date('m');
							// perkara masuk bulain ini
							$query = "select * from perkara where month(tanggal_pendaftaran)= '$currentMonth' and year(tanggal_pendaftaran)= '$currentYear'";
							
							$query_run = mysqli_query($connection, $query);
							//return $query->result();
							$row = mysqli_num_rows($query_run);
							echo '<h3>' . $row . '</h3>Perkara';
							?>
							<p>Perkara Bulan ini</p>
						</div>

					</div>

			</div>
			<!-- /.row -->
			<!-- Main row -->

			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

</body>

</html>
