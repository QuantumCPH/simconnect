<ul>
            <li>
		<table width="100%" border="2" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td class="title" width="10%" >Id</td>
                    <td class="title"width="10%">First Name</td>
                    <td class="title" width="10%">Last Name</td>
					 <td class="title" width="10%">Mobile Number</td>
					 <td class="title"width="10%">Balance</td>
					 <th id="sf_admin_list_th_fonet_customer" width="10%">Fonet Customer ID</th> 
                    <td class="title"width="10%">Address</td>
					<td class="title" width="10%">City</td>
                    <td class="title" width="10%">PO-BOX Number</td>                   
                    <td class="title" width="10%">Email</td>
                    <td class="title" width="10%">Created At</td>                                      
                                                         
                   
                    <td class="title"width="10%">Date Of Birth</td>
                    <td class="title"width="10%">Auto Refill</td>
                  </tr>

                <?php foreach($customers as $customer): ?>
                <?php if(!$customer->getFonetCustomerId()){?>
                 <tr>
                  <td ><?php  echo $customer->getId() ?></td>
                  <td><?php echo  $customer->getFirstName() ?></td>
                  <td><?php echo  $customer->getLastName() ?></td>
				  <td><?php echo  $customer->getMobileNumber() ?></td>
				  <td><?php echo  $customer->getBalance() ?></td>
				  <td><?php echo  $customer->getFonetCustomerId() ?></td> 
				   <td><?php echo  $customer->getAddress() ?></td>
                  <td><?php echo  $customer->getCity() ?></td>
                  <td><?php echo  $customer->getPoBoxNumber() ?></td>                  
                  <td><?php echo  $customer->getEmail() ?></td>
                  <td><?php echo  $customer->getCreatedAt() ?></td>                                                                      
                  
                  <td><?php echo  $customer->getDateOfBirth() ?></td>
                  <?php if ($customer->getAutoRefill()){ ?>
                  <td>Yes</td>
                  <?php }else{ ?>
                  <td>No</td>
                  <?php } ?>
                </tr>

                <?php }endforeach; ?>

              </table>
            </li>

          </ul>




