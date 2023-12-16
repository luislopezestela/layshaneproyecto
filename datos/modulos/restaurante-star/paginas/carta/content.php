<style type="text/css">
body{background:var(--greyLight-1);background:radial-gradient(#272727, #1b1b1b);font-family:sans-serif;text-transform:uppercase;}
footer{display:none;}
.luis_contenedor{align-self:center;padding:30px;}
.nav.active{background-color: var(--main-bg-color);box-shadow: 0 -15px 15px rgba(255, 255, 255, 0.05), inset 0 -15px 15px rgba(255, 255, 255, 0.05), 0 15px 15px rgba(0, 0, 0, 0.3), inset 0 15px 15px rgba(0, 0, 0, 0.3);}
.texr_title{position:relative;background-image:repeating-linear-gradient(105deg,#ffb338 0%,#3e2904 5%,#ffb338 12%);
color:#363833;filter:drop-shadow(5px 15px #000);transform:scaleY(1.05);position:relative;font-weight:900;font-size:min(max(50px, 9vw), 90px);letter-spacing:1px;-webkit-text-stroke:10px transparent;-webkit-background-clip:text;margin:auto;text-align:center;user-select:none;}
.components input[type=number]::-webkit-inner-spin-button, 
.components input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance:none; 
  margin:0;
}
.goldtext_b {
  font-size:min(max(16px, 5vw), 22px);
  text-transform: uppercase;
  line-height:1;
  text-align: center;
  background: linear-gradient(90deg, rgba(186,148,62,1) 0%, rgba(236,172,32,1) 20%, rgba(186,148,62,1) 39%, rgba(249,244,180,1) 50%, rgba(186,148,62,1) 60%, rgba(236,172,32,1) 80%, rgba(186,148,62,1) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;	
  animation: shine 3s infinite;
  background-size: 200%;
  background-position: left;

}
@keyframes shine {
  to{background-position:right}
 
}
.components input[type=number]{
	font-size:4rem;
	padding:10px;
	text-align:center;
	max-width:100%;
	border-radius:2rem;
	border:none;
	outline:none;
	color:#ddd;
	background-color: var(--main-bg-color);
}
.components{
	position:relative;
	box-sizing:border-box;
	width:100%;
	max-width:650px;
    border-radius: 3rem;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin:40px auto;
        background-color: var(--main-bg-color);
        border: 4px solid var(--main-bg-color);
    box-shadow: 0 -15px 15px rgba(255, 255, 255, 0.05), inset 0 -15px 15px rgba(255, 255, 255, 0.05), 0 15px 15px rgba(0, 0, 0, 0.3), inset 0 15px 15px rgba(0, 0, 0, 0.3);
    transition: all ease 0.2s;
}
:root {
	--main-bg-color: #1e1f26;
    --main-text-color: #ccc;
  --greyLight-1: #e4ebf5;
}
</style>

<div class="texr_title" data-text="Carta">Carta</div>
<div class="components"><input id="lockerd" type="number" name="locker"></div>
<div class="goldtext_b">Numero de Locker</div>
<script>

    document.getElementById("lockerd").focus();

</script>