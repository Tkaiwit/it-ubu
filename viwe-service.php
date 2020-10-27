<?php include('layout/header-othen.php')?>
<style>
        body {
            background: #fcfcfc;
            min-height: 1000px;
            font-family: 'Bai Jamjuree', sans-serif;
        }
        
    </style>
	<div>
		<div>
			<div id="columns">
                <h1>ประกาศ IT Services</h1>
                <?php include('connectDB/connectDB.php');
				$query = "SELECT * FROM service ORDER BY service_date DESC";
				$res = mysqli_query($conDB, $query);
				while($data = mysqli_fetch_array($res)){
			?>
                <article>
                	<?php if(!empty($data['service_img'])){?>
                	<img src="<?php echo $data['service_img']?>">
					<?php } ?>
                	<?php if(!empty($data['service_topic'])){?>
                	<h3><?php echo $data['service_topic']?></h3>
                    <?php } ?>
                    <p><?php echo $data['service_detail']?></p>
                    <?php if(!empty($data['service_tel'])){?>
                    <p>tel <?php echo $data['service_tel']?></p>
					<?php } ?>
                </article>
            <?php } ?> 
        </div>
			
		</div>		

	</div>		
<?php include('layout/footer.php')?>

<!-- 		</div>
	</div>
</body>
</html> -->