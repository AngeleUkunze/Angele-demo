<?php include 'headertrader.php';?><br><br><br>
  <main id="main">
    <section id="search-client" class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-3">
            <h2>Search Client Status</h2>
            <form method="POST" action="forms/checkclient.php" enctype="multipart/form-data" id="checkclient">
              <div class="form-group">
                <label for="clientName">Client ID Number:</label>
                <input type="number" class="form-control" id="clientName" name="idno" required>
              </div>
              <br><button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>
        </div>
      </div>
      <div id="results">
          
      </div>
    </section>
  </main>
<script>
    document.getElementById('checkclient').addEventListener('submit', function (event) {
        event.preventDefault();

        // Fetch and display results using AJAX
        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'forms/checkclient.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById('results').innerHTML = xhr.responseText;
            }
        };
        xhr.send(formData);
    });
</script>
<script>
    function printClientInfo() {
        var printContents = document.getElementById("results").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<?php include 'footer.php';?>
<style>
#results {
    margin-top: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f8f8f8;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-left: 2%;
}

#results p {
    margin: 0;
    padding-bottom: 10px;
}

#results strong {
    font-weight: bold;
}
#results table {
        width: 100%;
        border-collapse: collapse;
    }

    #results th, #results td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
    }

    #results th {
        background-color: #f2f2f2;
    }

    #results tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #results tr:hover {
        background-color: #ddd;
    }
</style>