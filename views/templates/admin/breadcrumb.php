<ol class="breadcrumb">
                    <?php
                    foreach($breadCrumb as $name => $src) {
                        reset($breadCrumb);
                        end($breadCrumb);
                        if ($name === key($breadCrumb)) {
                            echo '<li>' . $name . '</li>';
                        } else {
                            echo '<li><a href="' . $src . '">' . $name . '</a></li>';
                        }
                                    
                    }
                    ?>
                        
                    </ol>