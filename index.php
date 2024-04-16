<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Каталог товаров</title>
</head>
<body>
<?php
  $query = "SELECT * FROM `products`";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once 'vendor/connect.php';
            if ($_POST["sortBy"] == "price1") {
                $query = "SELECT * FROM `products` ORDER BY `price` ASC";
            } elseif ($_POST["sortBy"] == "price2") {
                $query = "SELECT * FROM `products` ORDER BY `price` DESC";
            }elseif ($_POST["sortBy"] == "Name1") {
                $query = "SELECT * FROM `products` ORDER BY `name` ASC";
            }elseif ($_POST["sortBy"] == "Name2") {
              $query = "SELECT * FROM `products` ORDER BY `name` DESC";
          }
        }
  ?>
     
      <div class="container mt-5 text-center">
        <div class="row">
          <div class="col">
            <p class="fw-bold" style="font-size: 50px;">Каталог товаров</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p style="font-size: 20px;">На данной странице представлены товары компании</p>
          </div>
        </div>
        <!-- Начало фильтрации -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <form method="post">
                            <select name="sortBy" class="form-select" aria-label="Default select example">
                            <option selected>Сортировать по цене:</option>
                            <option value="price1">Дешевле</option>
                            <option value="price2">Дороже</option>
                            <option value="Name1">Алфавиту от А-Я</option>
                            <option value="Name2">Алфавиту от Я-А</option>
                            </select>
                            <button>Применить</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Конец фильтрации -->
          </div>
        </div>
      </div>

<!-- Начало каталога -->
    <div class="container mt-5 text-center">
        <div class="row row-cols-3">
        <?php
            $_GET['query'] = $query;
            include ('./vendor/get_products.php');
        ?>  
        </div>
    </div>
<!-- Конец каталога -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>