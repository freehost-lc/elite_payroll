
  <section id="hero-animated" class="contact hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="assets/img/hero-carousel/ONLINEINsure.png" class="img-fluid animated">
      <h2>Create Payroll</h2>

            <div class="col-lg-10">
                <form method="post" action="generate-payroll.php">
                    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
          						<label>Sales Rep:</label>
                      <select name="sales_rep">
                        <option value="sr_1">Sales Rep 1</option>
                        <option value="sr_2">Sales Rep 2</option>
                      </select>      
                      <label>Bonuses (in dollars):</label>
                                  <input type="number" name="bonuses" />
          						<label>Date Period:</label>
          						<input type="text" name="date_range" value="01/01/2023 - 01/07/2023" />
                      <label>Client Name:</label>
                                  <input type="text" name="client_name"/>
                      <label>OnlineInsure Commissions:</label>
                                  <input type="number" name="comm_amount"/>
                    </div>

                 </br>

                	<div>
                        <input type="submit" value="Submit" name="send" />
                    </div>
                </form>
            </div>
    </div>
  </section>

