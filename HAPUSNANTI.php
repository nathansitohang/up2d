<select  name="option" id="top_month">
	<?php
		$month = !empty( $_GET['month'] ) ? $_GET['month'] : 0;
		
		for ($i = -1; $i <= 12; ++$i) {
			$time = strtotime(sprintf('+%d months', $i));
			$label = date('F', $time);
			$value = date('m', $time);

			printf('<option value="%s"%s>%s</option>', $value, $label );
		}
	?>
</select>

<?php

'<table class="table" align="center" style="margin: 0px auto;" id="example" width="100%" cellspacing="0">
			<thead>
			<tr>
			<th rowspan="2">Beban Puncak</th>
			<th colspan="2">Jan</th>
			<th colspan="2">Feb</th>
			<th colspan="2">Mar</th>
			<th colspan="2">Apr</th>
			<th colspan="2">Mei</th>		
			</tr>
			
			<tr>
			<th>LWBP</th>
			<th>WBP</th>
			<th>LWBP</th>
			<th>WBP</th>
			<th>LWBP</th>
			<th>WBP</th>
			<th>LWBP</th>
			<th>WBP</th>
			<th>LWBP</th>
			<th>WBP</th>
			</tr>
			</thead>
			
			
			<tbody> ';
			
			echo '  
			<tr>
			<td>Rata-rata</td>
			<td>1212</td>
			<td>1212</td>
			<td>1212</td>
			<td>1212</td>
			<td>1212</td>
			<td>1212</td>
			<td>1212</td>
			<td>1212</td>
			<td>1222</td>
			<td>1212</td>
			</tr> 
			<tr>
			<td>Tertinggi</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
			<td>Terendah</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			';
			echo '</tbody>';
			echo '</table>'; 
			?>