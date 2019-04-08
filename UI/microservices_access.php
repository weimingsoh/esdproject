<html>
<head>

<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #e6e6e6;
  border: black;
  color: black;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.btn-toolbar {
  margin-left:-5px;
}

.btn-toolbar .btn, .btn-toolbar .btn-group, .btn-toolbar .input-group {
  text-align:center;
  align-content:center;
}

</style>

</head>
<body>
<div class="btn-toolbar">
    <div role="group" class="btn-group">
        <button class= "button" href = "#"><span>Employee</span></button>   <button class="button" href = "#"><span>Payroll</span></button><br><br>
        <button class="button" href = "#"><span>Confirmed Shifts</span></button>    <button class="button" href = "#"><span>Preferred Shifts</span></button>
    </div>
</div>


</body>
</html>