<?php
$limit = 10;
$endPage = $cnt / $limit;
$endPage = (int) $endPage + 1;
$startPage = 1;
if($_POST["page"] != 1) $startPage = $_POST["page"];
$realEndPage = $endPage;
?>
<style>
	@media screen and (max-width: 39.9375em) {
		.pagination:after {
			display: inline-block;
			content: attr(data-page) " of " attr(data-total);
			position: relative;
			text-align: center;
			width: 80px;
			right: 80px;
		}

		.pagination-next {
			position: relative;
			left: 80px;
		}
	}
</style>
<ul class="pagination text-center" role="navigation" aria-label="Pagination" data-page="6" data-total="16">
	<li>
		<a href="javascript:search_list_go(1);">이전</a>
	</li>
	<!-- <li >
	<a href="javascript:search_list_go('${pageMaker.prev ? pageMaker.startPage-1 : 1}');"><i class="fas fa-angle-left"></i></a>
</li> -->
	<!--<c:forEach begin="${pageMaker.startPage }" end="${pageMaker.endPage }" var="pageNum">						
	<li class="page-item <c:out value="${pageMaker.cri.page == pageNum?'active':''}"/>
	<a href="javascript:search_list_go(${pageNum});" >${pageNum }</a>
</li>
</c:forEach>-->
	<?php
	$button = "";
	$cnt = 0;
	for ($i = $startPage; $i <= $endPage; $i++) {
		if($cnt == 10) break;
		$button = "<li value='{$i}'>";
		$button = $button . "<a href='javascript:search_list_go({$i})';>" . $i . "</a>";
		$button = $button . "</li>";
		echo $button;
		$cnt++;
	}
	?>
	<!-- <li>
	<a href="javascript:search_list_go(${pageMaker.next ? pageMaker.endPage+1 : pageMaker.cri.page});"><i class="fas fa-angle-right" ></i></a>
</li> -->
	<li>
		<a href="javascript:search_list_go(<?php print ($realEndPage) ?>);">다음</a>
	</li>
</ul>
<script>
	function search_list_go(pageNo) {
		let searhForm = document.querySelector("#searchForm");
		let page = searhForm.querySelector("input[name='page']");
		page.value = pageNo;
		let sch_table = document.querySelector('table.sch_table');

		if (sch_table != null) {
			let checkbox = sch_table.querySelectorAll('input[type=checkbox]:checked');
			if (checkbox != null && checkbox.length > 0) {
				let filter = [];
				checkbox.forEach(function (el, index) {
					filter.push(el.value);
				});
				searchForm.querySelector('input[name=filterArray]').value = filter;
			}
		}

		document.querySelector("form#searchForm").submit();
	}
</script>