@extends('layouts.chart')

@section('content')
   <div class="container">
      <h2>Sales statistics of 2021</h2>
      <div class="chart">
         <canvas id="myChart" width="100" height="100"></canvas>
      </div>

   </div>

   <script>
      var attualId = <?php echo $user->id  ?>;
   </script>
@endsection

