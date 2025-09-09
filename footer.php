</main>
<footer class="container"><p>&copy; <?php echo date('Y');?> <?php bloginfo('name');?></p></footer>
<script>
addEventListener('scroll',()=>{
  document.documentElement.classList.toggle('scrolled', scrollY>10);
});
</script> 
<?php wp_footer();?></body></html>