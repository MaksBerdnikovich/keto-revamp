<?php

use Dompdf\Dompdf;

function create_recipe_pdf($id)
{
	$dompdf = new Dompdf();
	$recipe = get_post($id);
	
	ob_start();
	get_template_part('pdf-templates/recipe', null, [
		'recipe' => $recipe,
	]);
	$html = ob_get_contents();
	ob_end_clean();
	
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4');
	$dompdf->render();
	$dompdf->stream("recipe.pdf", ["Attachment" => false]);
	exit(0);
}

function create_day_pdf($week, $day)
{
	$plan = get_user_plan()[$week][$day];
	$dompdf = new Dompdf();
	
	ob_start();
	get_template_part('pdf-templates/day', null, [
		'plan' => $plan,
	]);
	$html = ob_get_contents();
	ob_end_clean();
	
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4');
	$dompdf->render();
	$dompdf->stream("plan.pdf", ["Attachment" => false]);
	exit(0);
}

function create_week_pdf($week)
{
	$plan = get_user_plan()[$week];
	$dompdf = new Dompdf();
	
	ob_start();
	get_template_part('pdf-templates/week', null, [
		'plan' => $plan,
	]);
	$html = ob_get_contents();
	ob_end_clean();
	
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4');
	$dompdf->render();
	$dompdf->stream("week_plan.pdf", ["Attachment" => false]);
	exit(0);
}

function create_week_all_pdf()
{
	$plan = get_user_plan();
	$dompdf = new Dompdf();
	
	ob_start();
	get_template_part('pdf-templates/week_all', null, [
		'plan' => $plan,
	]);
	$html = ob_get_contents();
	ob_end_clean();
	
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4');
	$dompdf->render();
	$dompdf->stream("week_plan.pdf", ["Attachment" => false]);
	exit(0);
}

function create_grocery_pdf($ingredients)
{
	$dompdf = new Dompdf();

	ob_start();
	get_template_part('pdf-templates/grocery', null, [
		'ingredients' => $ingredients,
	]);
	$html = ob_get_contents();
	ob_end_clean();
	
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4');
	$dompdf->render();
	$dompdf->stream("dompdf_out.pdf", ["Attachment" => false]);
	exit(0);
}
