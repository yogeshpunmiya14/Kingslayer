<div class="left-sidebar">
	<h2>Category</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
		<?php
			 $result = $obj->select("*","category",1);
			 // echo "<pre>";
			 // print_r($result);
			 // echo "</pre>";
			 if(is_array($result)):
			 	foreach($result as $val):
			 		// print_r($val);
		?>						
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a href="categorywise.php?categoryid=<?php echo $val['category_id']; ?>">
					<?php echo $val['category_name'];?>
					</a>
				</h4>
			</div>
		</div>
		<?php
				endforeach;
			endif;
		?>
	</div><!--/category-products-->
					
	<div class="brands_products"><!--brands_products-->
		<h2>Brands</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
			<?php
				$result = $obj->select("*","brands","1");
				// echo "<pre>";
				// print_r($result);
				// echo "</pre>";
				if(is_array($result)){
	
					foreach($result as $val){
						// echo "<pre>";
						// print_r($val);
						// echo "</pre>";
						$id = $val['brand_id'];
						echo "<li><a href='#' class='brand_filter' for='$id'>";
						echo $val['brand_name'];
						echo "</a></li>";
					}
				}
			?>
			</ul>
		</div>
	</div><!--/brands_products-->
						
	<div class="price-range"><!--price-range-->
		<h2>Price Range</h2>
		<div class="well text-center">
			 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
			 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
		</div>
	</div><!--/price-range-->
						
	<div class="shipping text-center"><!--shipping-->
		<img src="images/home/shipping.jpg" alt="" />
	</div><!--/shipping-->
					
</div>