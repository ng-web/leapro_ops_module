<table class="table table-striped table-hover" id="datatable">

           <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Company</th>
           </tr>

        <?php
            foreach ($customers as $customer){
                $id = $customer["customer_id"];
                $name = $customer["customer_name"];
                $company = $customer["customer_company"]
        ?>
            <tr>
                <td><?= $customer["customer_id"] ?></td>
                <td><?= $customer["customer_name"] ?></td>
                <td><?= $customer["customer_company"] ?></td>
                <td><a href="?r=customer/locations&id=<?= $id ?>">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true">    
                View
            </a>
        </td>

            </tr>
        <?php
            }
        ?>
    </table>