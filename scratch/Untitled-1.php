<div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Doctor Schedule for Appointment</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php
                        //SELECT query
                        $stid = $_SESSION['stidd'];
                        $sql = "SELECT * FROM doctor WHERE status=0";
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row => $unit) {
                                $row_number = $row + 1;
                                $date_string = $unit['edate'];
                                $timestamp = strtotime($date_string);
                                $output_date = date("F d, Y", $timestamp);

                                $date_stringg = $unit['sdate'];
                                $timestampp = strtotime($date_stringg);
                                $output_datee = date("F d, Y", $timestampp);
                                ?>

                                <div class="card mb-4 ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">
                                            <?= $unit['dname']; ?>
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <?= $unit['spe']; ?>
                                        </h6>
                                        <hr>
                                        <p class="card-text">
                                            <strong>Date:</strong>
                                            <?= $output_date; ?> -
                                            <?= $output_datee; ?><br>
                                            <strong>Time:</strong>
                                            <?= $unit['time']; ?> -
                                            <?= $unit['ttime']; ?>
                                        </p>
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#bookapp<?= $unit['id']; ?>">
                                            Book Appointment
                                        </button>
                                    </div>
                                </div>

                            


                                <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>

                    </div>
                </div>
            </div>