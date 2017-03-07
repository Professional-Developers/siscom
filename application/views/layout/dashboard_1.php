<?php $this->load->view('layout/header') ?>
<?php
$opciones = $this->loaders->get_menu();
    // print_p($opciones);
    // exit();
?>
<style>
.imagenbonita{
	height:25%;
	width:25%;
	text-align: center;
	border-radius:25px;
}
.c{text-shadow: 0 0 0.2em #FFFF77;text-decoration:underline;}
.ax1 {color: white; text-shadow: black 0.1em 0.1em 0.2em;text-decoration:underline;font-size:35px;}
.ax2 {
    color: white;
    font-size: 25px;
    padding-left: 70px;
    text-shadow: 0.1em 0.1em 0.2em crimson;
}
.ax3 {color: white; text-shadow: black 0.1em 0.1em 0.2em;padding-left:200px;}
</style>
<div>

<h1 class="ax1">Bienvenidos</h1>
<h1 class="ax2">Sistema de Vaso de Leche - Municipalidad de Florencia de Mora</h1>
</div>
<center>
	<img class="imagenbonita" src="<?php echo URL_IMG ?>vaso2.jpg" alt="">
</center>
<div>
<p>Programa de Vaso de Leche</p>
<p>
El Programa del Vaso de Leche (PVL), es un programa social creado mediante la Ley Nº 24059 y complementada con la Ley Nº 27470, a fin de ofrecer una ración diaria de alimentos a una población considerada vulnerable, con el propósito de ayudarla a superar la inseguridad alimentaria en la que se encuentra. Las acciones de este programa, realizadas con la fuerte participación de la comunidad, tienen como fin último elevar su nivel nutricional y así contribuir a mejorar la calidad de vida de este colectivo que, por su precaria situación económica, no estaría en condiciones de atender sus necesidades elementales.
</p>
</div>
<?php $this->load->view('layout/footer') ?>