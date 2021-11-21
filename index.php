<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />

<!-- (start) CSS loading-->
<link href='assets/css/fullcalendar.min.css' rel='stylesheet' />
<link href='assets/css/custom.css?<?php echo time()?>' rel='stylesheet' />
<!-- (end) CSS loading-->

<!-- (start) script loading-->
<script src='assets/js/jquery.min.js'></script>
<script type="text/javascript" src='assets/js/fullcalendar.min.js'></script>
<script type="text/javascript" src='assets/js/custom.js?<?php echo time()?>'></script>
<!-- (end) script loading-->

</head>
<body>

<!-- (start) event form section-->
<div class="month_year_div">
  <h1>Community Event Directory<h1>
  <p class="info-text">
    Use the below form to check past and future events
  </p>

  <!-- (start) month dropdown-->
  <select name="month" id="month">
    <?php foreach (range(1, 12) as $month_num): $month = date("F", mktime(0, 0, 0, $month_num, 10))?>  
      <option value="<?php echo $month_num; ?>" <?php print ($month == 'November') ? "selected" : "";?>>
        <?php echo $month; ?>
      </option>
    <?php endforeach; ?>
  </select>
  <!-- (end) month dropdown-->

  <!-- (start) year dropdown-->
  <select name="year" id="year">
   <?php foreach (range(2001, 2031) as $year): ?>  
    <option value="<?php echo $year; ?>" <?php print ($year == '2021') ? "selected" : "";?>>
      <?php echo $year; ?>
    </option>
   <?php endforeach; ?>
  </select>
  <!-- (end) year dropdown-->

  <!-- (start) submit button-->
  <button onclick="fetchEvents()" id="submit_button" class="fc-button">
    Click to Fetch Events
  </button>
  <!-- (end) submit button-->

  <!-- (start) info div-->
  <p>
    <ul class="info-text list">
      <li>All the white spaces with no event line in it are available slots.</li>
      <li>Click on event title to go to external detail page.</li>
      <li>Click on any event cell to view the timings.</li>
    </ul>
  </p>
  <!-- (end) info div-->
</div>
<!-- (end) event form section-->

<!-- (start) calendar element-->
<div id='calendar'></div>
<!-- (start) calendar element-->

</body>
</html>