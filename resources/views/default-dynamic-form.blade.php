<!DOCTYPE html>
<html>
<head>
    <title>Laravel Livewire Example</title>
    @livewireStyles
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<div class="container m-5">

    <div class="card mt-5">
        <div class="card-header">
          Dynamic form generation
        </div>
        <div class="card-body">
          @livewire('contacts')
        </div>
      </div>

</div>

</body>

@livewireScripts

</html>
