<!DOCTYPE html5>
<html lang="pt-br">
<?php
include("components/main/head.php");
?>

<body>
  <?php
  include("components/main/header.php");
  include("components/main/modalLogin.php");
  include("components/main/cadast_choice.php");
  ?>
  <main>
    <section class="faq_header">
      <h1 class="faq_title">Como podemos ajudar?</h1>
      <input type="text" name="searchTopic" id="faq_searchbar" class="faq_searchbar">
    </section>
    <section class="centralizer">
      <h2>Principais tópicos de ajuda</h2>
      <div class="help_topics" id="search_results"></div>
    </section>
  </main>
  <?php
  include("components/main/footer.php");
  include("components/main/scripts.php");
  ?>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: "php/searchFAQ.php",
        method: "POST",
        success: function(data) {
          $("#search_results").html(data);
        }
      });
      $("#faq_searchbar").on("input", function() {
        var searchValue = $(this).val();
        $.ajax({
          url: "php/searchFAQ.php",
          method: "POST",
          data: {
            searchTopic: searchValue
          },
          success: function(data) {
            if (data.trim() === "") {
              $("#search_results").html("<div><h3 style='text-align: center;'>Sem resultados</h3></div>");
            } else {
              $("#search_results").html(data);
            }
          }
        });
      });
    });
  </script>
</body>

</html>