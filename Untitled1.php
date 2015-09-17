<?php

$name_error='';

echo 'teste';

if(!empty($_POST['submitted']))
{//if submitted, then validate

	echo 'entrou no if';

	$name = trim($_POST['name']);
	
	$error = false;
	
	if(empty($name))
	{
		$name_error='Name is empty. Please enter your name.';
		$error=true;
	}
	
	if(empty($_POST['selectedcake']))
	{
		$select_cake_error = "Please select a cake size";
		$error=true;
	}
	else
	{
		$selected_cake = $_POST['selectedcake'];
	}
	
	if(empty($_POST['flavor']))
	{
		$flavor_error ="Please select a flavor from the list";
		$error=true;
	}
	else
	{
		$flavor = $_POST['flavor'];
	}
	
	if(empty($_POST['Filling']) || count($_POST['Filling']) < 2)
	{
		$filling_error = "Please select at least 2 items for filling";
		$error=true;
	}
	
	$filling = $_POST['Filling'];
	
	if(empty($_POST['agree']))
	{
		$terms_error = "If you agree to the terms, please check the box below";
		$error=true;
	}
	else
	{
		$agree = $_POST['agree'];
	}
	
	if(false === $error)
	{
		//Validation Success!
		//Do form processing like email, database etc here
		
		header('Location: Untitled1.php');
	}
}
?>
<!DOCTYPE html>
<html >
<head>
    <title>Cake Form</title>
    <link href="cakeform.css" rel="stylesheet" type="text/css" />
</head>
<body >
    <div id="wrap">
        <form method="post" action='?' id="cakeform" >
        <div>
            <div class="cont_order">
               <fieldset>
                <legend>Make your cake!</legend>
				
                <div class='field_container'>
                <label >Size Of the Cake</label>
				<span class='error'><?php echo $select_cake_error; ?></span>
                <label class='radiolabel'><input type="radio"  name="selectedcake" value="Round6" 
				<?php echo ($selected_cake=='Round6')? 'checked':''; ?> />Round cake 6" -  serves 8 people</label><br/>
				
                <label class='radiolabel'><input type="radio"  name="selectedcake" value="Round8" 
				<?php echo ($selected_cake=='Round8')? 'checked':''; ?> />Round cake 8" - serves 12 people</label><br/>
				
                <label class='radiolabel'><input type="radio"  name="selectedcake" value="Round10" 
				<?php echo ($selected_cake=='Round10')? 'checked':''; ?> 	/>Round cake 10" - serves 16 people</label><br/>
				
                <label class='radiolabel'><input type="radio"  name="selectedcake" value="Round12" 
				<?php echo ($selected_cake=='Round12')? 'checked':''; ?> />Round cake 12" - serves 30 people</label><br/>
				
                </div>
                
                <div class='field_container'>
                    <label for="flavor">Select Flavor:</label >
					<span class='error'><?php echo $flavor_error?></span>
                    <select id="flavor" name='flavor' >
                    <option value="">Select Flavor</option>
                    <option <?php echo $flavor=='Yellow'?'selected':''; ?> >Yellow</option>
                    <option <?php echo $flavor=='White'?'selected':''; ?> >White</option>
                    <option <?php echo $flavor=='Chocolate'?'selected':''; ?> >Chocolate</option>
                    <option <?php echo $flavor=='Combo'?'selected':''; ?> >Combo</option>
                   </select>
                </div>
                <div class='field_container'>
                    <label >Fillings:</label>
					<span class='error'><?php echo $filling_error ?></span>
					
                    <label><input type="checkbox" value="Lemon" name='Filling[]' 
					<?php echo (in_array('Lemon',$filling)) ?'checked':'' ?> />Lemon</label>
					
                    <label><input type="checkbox" value="Custard" name='Filling[]' 
					<?php echo (in_array('Custard',$filling)) ?'checked':'' ?> />Custard</label>
					
                    <label><input type="checkbox" value="Fudge" name='Filling[]' 
					<?php echo (in_array('Fudge',$filling)) ?'checked':'' ?> />Fudge</label>
					
                    <label><input type="checkbox" value="Mocha" name='Filling[]'  
					<?php echo (in_array('Mocha',$filling)) ?'checked':'' ?> />Mocha</label>
					
                    <label><input type="checkbox" value="Raspberry" name='Filling[]' 
					<?php echo (in_array('Raspberry',$filling)) ?'checked':'' ?> />Raspberry</label>
					
                    <label><input type="checkbox" value="Pineapple" name='Filling[]' 
					<?php echo (in_array('Pineapple',$filling)) ?'checked':'' ?> />Pineapple</label>
					
               </div>
               <div class='field_container'>
					<span class='error'><?php echo $terms_error ?></span>
					
                   <label class="inlinelabel">
				   <input type="checkbox" id="agree" name='agree'
				   <?php echo (empty($_POST['agree'])) ? '':'checked' ?> /> I agree to the <a href="javascript:void(0);">terms and conditions</a></label>
               </div>
              </fieldset>
            </div>
            
        	<div class="cont_details">
            	<fieldset>
                <legend>Contact Details</legend>
                <label for='name'>Name</label>
                <input type="text" id="name" name='name' 
				value='<?php echo htmlentities($name) ?>' />
				
				<span class='error'><?php echo $name_error ?></span>
                <br/>
                <label for='address'>Address</label>
                <input type="text" id="address" name='address' />
                <br/>
                <label for='phonenumber'>Phone Number</label>
                <input type="text"  id="phonenumber" name='phonenumber'/>
                <br/>
                </fieldset>
            </div>
            <input type='submit' name='submitted' id='submit' value='Submit'  />
        </div>  
       </form>
	</div>

</body>
</html>