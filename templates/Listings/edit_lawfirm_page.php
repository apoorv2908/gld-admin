<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Law Firms Listing</title>
    <!-- bootstrap core css -->
    <?= $this->Html->css(['bootstrap.css', 'font-awesome.min.css', 'style.css', 'responsive.css']) ?>
        <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css') ?>

     <style>
       .form-table {
    width: 80%;
    border-collapse: collapse;
    margin: 0 auto; /* This will center the table */
}
       
        .form-table td {
            padding: 12px 5px;
            vertical-align: top;
           
        }
        .form-label {
            color: #165fa2;
            font-weight: bold;
            white-space: nowrap;
            padding-right: 15px;
            width: 30%;
            font-size: large;
        }
        .form-input {
            width: 70%;
        }
        .form-control {
            width: 100%;
        }
        .required-star {
            color: red;
            font-size: 20px;
        }
        #addCourtRow {
    white-space: nowrap;
    margin-left: 10px;
}

        .note-editable {
    display: block !important;
}
.note-editor .note-editable {
    background-color: white !important;
}

    
        @media (max-width: 768px) {
            .form-table, .form-table tbody, .form-table tr, .form-table td {
                display: block;
                width: 100%;
            }
            .form-label, .form-input {
                width: 100%;
                display: block;
            }
            .form-label {
                padding-bottom: 5px;
            }
            
        }
        .practice-areas-container {
            column-count: 3;
            column-gap: 20px;
        }
        @media (max-width: 576px) {
            .practice-areas-container {
                column-count: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <!-- Banner -->

    
    <!-- Content Section -->
    <div class="m-3 mb-5">
        <p class="bg-white my-3">
 
</p>
        <div class="row bg-light">
            <!-- Filter Section -->

            <!-- Articles Section -->
           <div class="col-md-9 mt-3 mb-5 bg-white">
                <div class="cl-2 d-flex text-uppercase justify-content-center h5 p-2">
            <b>Update a Listing - Directory of Law Firms</b>
                </div>
                <hr>

                <div>
                    <?= $this->Form->create($listing, ['type' => 'file']) ?>
                                                             <?= $this->Flash->render() ?>

                    <fieldset>
                        <div class="bgcc text-white h5 p-2 ">
                            Personal Information
                        </div>
                        
                        <table class="form-table">
                            <tr>
                                <td class="form-label">Name of Law Firm <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('law_firm', [
                                        'label' => false,
                                        
                                        'placeholder' => 'Law Firm Name'
                                    ]) ?>
                                </td>
                            </tr>
                        </table>

                        <hr >

                        <div class="text-primary h5">Name of Contact Person</div>

                        <table class="form-table">
                            <tr>
        <td class="form-label">Salutation <span class="required-star">*</span></td>
        <td class="form-input">
            <?= $this->Form->control('salutation', [
                'type' => 'select',
                'options' => [
                    'Mr.' => 'Mr.',
                    'Ms.' => 'Ms.',
                    'Mrs.' => 'Mrs.'
                ],
                'empty' => 'Select',
                'label' => false,
                
            ]) ?>
        </td>
    </tr>
                            <tr>
                                <td class="form-label">First Name <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('firstname', [
                                        'label' => false,
                                        
                                        'placeholder' => 'Contact Person Firstname'
                                    ]) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="form-label">Last Name <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('lastname', [
                                        'label' => false,
                                        
                                        'placeholder' => 'Contact Person Lastname'
                                    ]) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="form-label">Designation <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('designation', [
                                        'label' => false,
                                        
                                        'placeholder' => 'Designation'
                                    ]) ?>
                                </td>
                            </tr>
                        </table>

                        <hr >

                        <table class="form-table">
                            <tr>
                                <td class="form-label">Country <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('country', [
                                        'type' => 'select',
                                        'options' => $countries,
                                        'empty' => 'Select',
                                        'label' => false,
                                        
                                        'id' => 'country-id'
                                    ]) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="form-label">State <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('state', [
                                        'type' => 'select',
                                        'empty' => 'Select',
                                        'label' => false,
                                        
                                        'id' => 'state-id'
                                    ]) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="form-label">City <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('city', [
                                        'type' => 'select',
                                        'empty' => 'Select',
                                        'label' => false,
                                        
                                        'id' => 'city-id'
                                    ]) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="form-label">Pincode/Zipcode <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('pincode', [
                                        'label' => false,
                                        
                                        'placeholder' => 'Pincode/Zipcode'
                                    ]) ?>
                                </td>
                            </tr>
                        </table>

                        <hr>


                        <table class="form-table">
                           <tr>
                            <td></td>
                            <td>                        <div class="text-success fw-bold">Write only street address, do not write city street or country</div>
</td>
                           </tr>
                            <tr>
                                <td class="form-label">Street Address <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('street_address', [
                                        'label' => false,
                                        
                                        'placeholder' => 'Street Address 1'
                                    ]) ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="form-label">Street Address 2 </td>
                                <td class="form-input">
                                    <?= $this->Form->control('street_address_2', [
                                        'label' => false,
                                        'required' => false,
                                        'placeholder' => 'Street Address 2'
                                    ]) ?>
                                </td>
                            </tr>
                        </table>

                        <hr >


                        <table class="form-table">
                            <tr>
                                <td></td>
                                <td>                        <div class="text-success fw-bold">Please provide email ID on which you wish to receive online queries from the prospective clients.</div>
</td>
                            </tr>
                            <tr>
                                <td class="form-label">Email <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('email', [
                                        'label' => false,
                                        
                                    ]) ?>
                                </td>
                            </tr>
                        </table>

                        <hr>


                        <table class="form-table">
                            <tr>
                                <td></td>
                                <td>                        <div class="text-success fw-bold"><b>Please provide only the root URL and not the URL of internal pages of your website.</b></div>
</td>
                            </tr>
                            <tr>
                                <td class="form-label">Website</td>
                                <td class="form-input">
                                    <?= $this->Form->control('website', [
                                        'label' => false,
                                        'required' => false,
                                        'placeholder' => 'Website'
                                    ]) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="form-label">Phone (s)</td>
                               <td class="form-input">
        <div class="row">
            <div class="col-md-3">
                <?= $this->Form->control('phoneCode', [
                    'type' => 'select',
                    'label' => false,
                    
                    'id' => 'phone-code',
                    'style' => 'width: 100%',
                                                            'empty' => "Select",
                                                               'options' => [
            '+1' => '+1',
            '+7' => '+7',
            '+20' => '+20',
            '+27' => '+27',
            '+30' => '+30',
            '+31' => '+31',
            '+32' => '+32',
            '+33' => '+33',
            '+34' => '+34',
            '+36' => '+36',
            '+39' => '+39',
            '+40' => '+40',
            '+41' => '+41',
            '+43' => '+43',
            '+44' => '+44',
            '+45' => '+45',
            '+46' => '+46',
            '+47' => '+47',
            '+48' => '+48',
            '+49' => '+49',
            '+51' => '+51',
            '+52' => '+52',
            '+53' => '+53',
            '+54' => '+54',
            '+55' => '+55',
            '+56' => '+56',
            '+57' => '+57',
            '+58' => '+58',
            '+60' => '+60',
            '+61' => '+61',
            '+62' => '+62',
            '+63' => '+63',
            '+64' => '+64',
            '+65' => '+65',
            '+66' => '+66',
            '+81' => '+81',
            '+82' => '+82',
            '+84' => '+84',
            '+86' => '+86',
            '+90' => '+90',
            '+91' => '+91',
            '+92' => '+92',
            '+93' => '+93',
            '+94' => '+94',
            '+95' => '+95',
            '+98' => '+98',
            '+212' => '+212',
            '+213' => '+213',
            '+216' => '+216',
            '+218' => '+218',
            '+220' => '+220',
            '+221' => '+221',
            '+222' => '+222',
            '+223' => '+223',
            '+224' => '+224',
            '+225' => '+225',
            '+226' => '+226',
            '+227' => '+227',
            '+228' => '+228',
            '+229' => '+229',
            '+230' => '+230',
            '+231' => '+231',
            '+232' => '+232',
            '+233' => '+233',
            '+234' => '+234',
            '+235' => '+235',
            '+236' => '+236',
            '+237' => '+237',
            '+238' => '+238',
            '+239' => '+239',
            '+240' => '+240',
            '+241' => '+241',
            '+242' => '+242',
            '+243' => '+243',
            '+244' => '+244',
            '+245' => '+245',
            '+246' => '+246',
            '+248' => '+248',
            '+249' => '+249',
            '+250' => '+250',
            '+251' => '+251',
            '+252' => '+252',
            '+253' => '+253',
            '+254' => '+254',
            '+255' => '+255',
            '+256' => '+256',
            '+257' => '+257',
            '+258' => '+258',
            '+260' => '+260',
            '+261' => '+261',
            '+262' => '+262',
            '+263' => '+263',
            '+264' => '+264',
            '+265' => '+265',
            '+266' => '+266',
            '+267' => '+267',
            '+268' => '+268',
            '+269' => '+269',
            '+290' => '+290',
            '+291' => '+291',
            '+297' => '+297',
            '+298' => '+298',
            '+299' => '+299',
            '+350' => '+350',
            '+351' => '+351',
            '+352' => '+352',
            '+353' => '+353',
            '+354' => '+354',
            '+355' => '+355',
            '+356' => '+356',
            '+357' => '+357',
            '+358' => '+358',
            '+359' => '+359',
            '+370' => '+370',
            '+371' => '+371',
            '+372' => '+372',
            '+373' => '+373',
            '+374' => '+374',
            '+375' => '+375',
            '+376' => '+376',
            '+377' => '+377',
            '+378' => '+378',
            '+379' => '+379',
            '+380' => '+380',
            '+381' => '+381',
            '+382' => '+382',
            '+383' => '+383',
            '+385' => '+385',
            '+386' => '+386',
            '+387' => '+387',
            '+389' => '+389',
            '+420' => '+420',
            '+421' => '+421',
            '+423' => '+423',
            '+500' => '+500',
            '+501' => '+501',
            '+502' => '+502',
            '+503' => '+503',
            '+504' => '+504',
            '+505' => '+505',
            '+506' => '+506',
            '+507' => '+507',
            '+508' => '+508',
            '+509' => '+509',
            '+590' => '+590',
            '+591' => '+591',
            '+592' => '+592',
            '+593' => '+593',
            '+594' => '+594',
            '+595' => '+595',
            '+596' => '+596',
            '+597' => '+597',
            '+598' => '+598',
            '+599' => '+599',
            '+670' => '+670',
            '+672' => '+672',
            '+673' => '+673',
            '+674' => '+674',
            '+675' => '+675',
            '+676' => '+676',
            '+677' => '+677',
            '+678' => '+678',
            '+679' => '+679',
            '+680' => '+680',
            '+681' => '+681',
            '+682' => '+682',
            '+683' => '+683',
            '+685' => '+685',
            '+686' => '+686',
            '+687' => '+687',
            '+688' => '+688',
            '+689' => '+689',
            '+690' => '+690',
            '+691' => '+691',
            '+692' => '+692',
            '+850' => '+850',
            '+852' => '+852',
            '+853' => '+853',
            '+855' => '+855',
            '+856' => '+856',
            '+880' => '+880',
            '+886' => '+886',
            '+960' => '+960',
            '+961' => '+961',
            '+962' => '+962',
            '+963' => '+963',
            '+964' => '+964',
            '+965' => '+965',
            '+966' => '+966',
            '+967' => '+967',
            '+968' => '+968',
            '+970' => '+970',
            '+971' => '+971',
            '+972' => '+972',
            '+973' => '+973',
            '+974' => '+974',
            '+975' => '+975',
            '+976' => '+976',
            '+977' => '+977',
            '+992' => '+992',
            '+993' => '+993',
            '+994' => '+994',
            '+995' => '+995',
            '+996' => '+996',
            '+998' => '+998'
        ]

                ]) ?>
            </div>
            <div class="col-md-9">
                <?= $this->Form->control('phone', [
                    'label' => false,
                    'placeholder' => 'Phone number',
                    'style' => 'width: 100%'

                ]) ?>
            </div>
        </div>
    </td>
                            </tr>
                            <tr>
                                <td class="form-label">Mobile (s) <span class="required-star">*</span></td>
                          <td class= "form-input">
<div class="row">
            <div class="col-md-3">
                <?= $this->Form->control('mobileCode', [
                    'type' => 'select',
                    'label' => false,
                    
                    'id' => 'mobile-code',
                    'style' => 'width: 100%',
                    'empty' => "Select",
                       'options' => [
            '+1' => '+1',
            '+7' => '+7',
            '+20' => '+20',
            '+27' => '+27',
            '+30' => '+30',
            '+31' => '+31',
            '+32' => '+32',
            '+33' => '+33',
            '+34' => '+34',
            '+36' => '+36',
            '+39' => '+39',
            '+40' => '+40',
            '+41' => '+41',
            '+43' => '+43',
            '+44' => '+44',
            '+45' => '+45',
            '+46' => '+46',
            '+47' => '+47',
            '+48' => '+48',
            '+49' => '+49',
            '+51' => '+51',
            '+52' => '+52',
            '+53' => '+53',
            '+54' => '+54',
            '+55' => '+55',
            '+56' => '+56',
            '+57' => '+57',
            '+58' => '+58',
            '+60' => '+60',
            '+61' => '+61',
            '+62' => '+62',
            '+63' => '+63',
            '+64' => '+64',
            '+65' => '+65',
            '+66' => '+66',
            '+81' => '+81',
            '+82' => '+82',
            '+84' => '+84',
            '+86' => '+86',
            '+90' => '+90',
            '+91' => '+91',
            '+92' => '+92',
            '+93' => '+93',
            '+94' => '+94',
            '+95' => '+95',
            '+98' => '+98',
            '+212' => '+212',
            '+213' => '+213',
            '+216' => '+216',
            '+218' => '+218',
            '+220' => '+220',
            '+221' => '+221',
            '+222' => '+222',
            '+223' => '+223',
            '+224' => '+224',
            '+225' => '+225',
            '+226' => '+226',
            '+227' => '+227',
            '+228' => '+228',
            '+229' => '+229',
            '+230' => '+230',
            '+231' => '+231',
            '+232' => '+232',
            '+233' => '+233',
            '+234' => '+234',
            '+235' => '+235',
            '+236' => '+236',
            '+237' => '+237',
            '+238' => '+238',
            '+239' => '+239',
            '+240' => '+240',
            '+241' => '+241',
            '+242' => '+242',
            '+243' => '+243',
            '+244' => '+244',
            '+245' => '+245',
            '+246' => '+246',
            '+248' => '+248',
            '+249' => '+249',
            '+250' => '+250',
            '+251' => '+251',
            '+252' => '+252',
            '+253' => '+253',
            '+254' => '+254',
            '+255' => '+255',
            '+256' => '+256',
            '+257' => '+257',
            '+258' => '+258',
            '+260' => '+260',
            '+261' => '+261',
            '+262' => '+262',
            '+263' => '+263',
            '+264' => '+264',
            '+265' => '+265',
            '+266' => '+266',
            '+267' => '+267',
            '+268' => '+268',
            '+269' => '+269',
            '+290' => '+290',
            '+291' => '+291',
            '+297' => '+297',
            '+298' => '+298',
            '+299' => '+299',
            '+350' => '+350',
            '+351' => '+351',
            '+352' => '+352',
            '+353' => '+353',
            '+354' => '+354',
            '+355' => '+355',
            '+356' => '+356',
            '+357' => '+357',
            '+358' => '+358',
            '+359' => '+359',
            '+370' => '+370',
            '+371' => '+371',
            '+372' => '+372',
            '+373' => '+373',
            '+374' => '+374',
            '+375' => '+375',
            '+376' => '+376',
            '+377' => '+377',
            '+378' => '+378',
            '+379' => '+379',
            '+380' => '+380',
            '+381' => '+381',
            '+382' => '+382',
            '+383' => '+383',
            '+385' => '+385',
            '+386' => '+386',
            '+387' => '+387',
            '+389' => '+389',
            '+420' => '+420',
            '+421' => '+421',
            '+423' => '+423',
            '+500' => '+500',
            '+501' => '+501',
            '+502' => '+502',
            '+503' => '+503',
            '+504' => '+504',
            '+505' => '+505',
            '+506' => '+506',
            '+507' => '+507',
            '+508' => '+508',
            '+509' => '+509',
            '+590' => '+590',
            '+591' => '+591',
            '+592' => '+592',
            '+593' => '+593',
            '+594' => '+594',
            '+595' => '+595',
            '+596' => '+596',
            '+597' => '+597',
            '+598' => '+598',
            '+599' => '+599',
            '+670' => '+670',
            '+672' => '+672',
            '+673' => '+673',
            '+674' => '+674',
            '+675' => '+675',
            '+676' => '+676',
            '+677' => '+677',
            '+678' => '+678',
            '+679' => '+679',
            '+680' => '+680',
            '+681' => '+681',
            '+682' => '+682',
            '+683' => '+683',
            '+685' => '+685',
            '+686' => '+686',
            '+687' => '+687',
            '+688' => '+688',
            '+689' => '+689',
            '+690' => '+690',
            '+691' => '+691',
            '+692' => '+692',
            '+850' => '+850',
            '+852' => '+852',
            '+853' => '+853',
            '+855' => '+855',
            '+856' => '+856',
            '+880' => '+880',
            '+886' => '+886',
            '+960' => '+960',
            '+961' => '+961',
            '+962' => '+962',
            '+963' => '+963',
            '+964' => '+964',
            '+965' => '+965',
            '+966' => '+966',
            '+967' => '+967',
            '+968' => '+968',
            '+970' => '+970',
            '+971' => '+971',
            '+972' => '+972',
            '+973' => '+973',
            '+974' => '+974',
            '+975' => '+975',
            '+976' => '+976',
            '+977' => '+977',
            '+992' => '+992',
            '+993' => '+993',
            '+994' => '+994',
            '+995' => '+995',
            '+996' => '+996',
            '+998' => '+998'
        ]
                ]) ?>
            </div>
            <div class="col-md-9">
              <?= $this->Form->control('mobile', [
                                        'label' => false,
                                        
                                        'placeholder' => 'Mobile',
                                                            'style' => 'width: 100%'

                                    ]) ?>
            </div>
        </div>
                                </td>
                            </tr>
                             <tr>
    <td>
        <?= $this->Form->control('image', [
            'label' => false,
            'type' => 'file',
            'required' => false, // Changed to false since existing image may be used
            'id' => 'image-upload',
            'accept' => 'image/*'
        ]) ?>
        
        <!-- Display existing image if it exists -->
        <?php if (!empty($listing->image)): ?>
            <div id="existing-image-container" style="margin-top: 10px;">
                <p>Current Image:</p>
                <img src="<?= '/img/' . h($listing->image) ?>" alt="Current Image" style="max-width: 150px; max-height: 150px; display: block;"/>
                <div class="form-check mt-2">
                    <?= $this->Form->checkbox('remove_image', [
                        'id' => 'remove-image-checkbox',
                        'class' => 'form-check-input'
                    ]) ?>
                    <label class="form-check-label" for="remove-image-checkbox">
                        Remove current image
                    </label>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Preview container for new image -->
        <div id="image-preview-container" style="margin-top: 10px; display: none;">
            <p>New Image Preview:</p>
            <img id="image-preview" src="#" alt="Preview" style="max-width: 150px; max-height: 150px; display: block;"/>
            <button type="button" id="remove-image" class="btn btn-danger btn-sm mt-2">Cancel Upload</button>
        </div>
    </td>
</tr>
                        </table>

                        <div class="bgcc text-white h5 p-2">
                            Professional Information
                        </div>

                        <table class="form-table">
                            <tr>
                                <td class="form-label">Year of Establishment</td>
                                <td class="form-input">
                                    <?= $this->Form->control('estd_year', [
                                        'label' => false,
                                        'type' => 'select',
                                        'options' => array_combine(range(date('Y'), 1900), range(date('Y'), 1900)),
                                        'empty' => 'Select',
                                    ]) ?>
                                </td>
                            </tr>
                        </table>

                        <hr>

                           <div id="courtOfPracticeContainer">
    <div class="court-row">
        <table class="form-table ">
            <tr>
                <td class="form-label">Court(s) of Practice</td>
                <td class="form-label" >Court</td>
                <td class="form-label" >Place</td>
                <td style="width: 20%"></td>
            </tr>
            <tr>
                <td></td>
                <td >
                    <?= $this->Form->input('court_of_practice[]', [
                        'label' => false
                    ]) ?>
                </td>
                <td >
                    <?= $this->Form->input('place[]', [
                        'label' => false
                    ]) ?>
                </td>
                <td>
                    <button type="button" id="addCourtRow" class="btn btn-primary">More Courts</button>
                </td>
            </tr>
        </table>
    </div>
</div>

                        <div class="bgcc text-white h5 p-2 mt-4">
                            Please Select Practice Area
                        </div>
                        <div class="text-success fw-bold"><b>In case of Premium Listing, maximum 50 Practice Areas will be displayed</b></div><br>
                        <div class="text-success fw-bold mb-3"><b>In case of Basic Listing, maximum 05 Practice Areas will be displayed</b></div>

                 <div class="practice-areas-container">
    <?php 
    // Ensure we have an array of selected practice areas
    $selectedPracticeAreas = [];
    if (!empty($listing->practice_area)) {
        $selectedPracticeAreas = is_array($listing->practice_area) 
            ? $listing->practice_area 
            : explode(',', $listing->practice_area);
    }
    
    foreach ($practicearea as $id => $name): 
        $checked = in_array($id, $selectedPracticeAreas);
    ?>
    <div class="form-check">
        <table>
            <tr>
                <td>
                    <?= $this->Form->checkbox('practice_area[]', [
                        'value' => $id,
                        'id' => 'practice_area_'.$id,
                        'class' => "mt-2",
                        'checked' => $checked
                    ]) ?>
                </td>
                <td>
                    <label class="and mx-2" for="practice_area_<?= $id ?>"><?= $name ?></label>
                </td>
            </tr>
        </table>
    </div>
    <?php endforeach; ?>
</div>

                        <div class="bgcc text-white h5 p-2 mt-5 mb-3">
                            Brief Profile
                        </div>
                          <div class="text-success mb-3">
                           <b> Provide a detailed write up which may include your areas of specialisation, experience, important successful litigations, important clientele, office hours and such other details which may be useful to your prospective clients who look up your Listing page.</b><br>
                           <br><b> Hyperlinks are not allowed. In case hyperlinks are found, the listing will be suspended from display.</b>
                        </div>
                        
                        <table class="form-table">
                           <tr>
    <td colspan="2"> <!-- Use colspan to span both columns -->
        <?= $this->Form->control('brief_detail', [
            'label' => false,
            'class' => 'summernote',
            'id' => 'brief-detail-editor' // Add specific ID
        ]) ?>
    </td>
</tr>
                            <tr>
                                <td class="form-label">Whether <b>FREE INITIAL CONSULTATION</b> provided <span class="required-star">*</span></td>
                                <td class="form-input">
                                    <?= $this->Form->control('free_consultation', [
                                        'type' => 'select',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No'],
                                        'label' => false,
                                        
                                        'empty' => 'Yes/No'
                                    ]) ?>
                                </td>
                            </tr>
                        </table>

                        <div class="mt-4 text-center mb-4">
                            <?= $this->Form->button('Submit', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </fieldset>
                    <?= $this->Form->end() ?>
                </div>
            </div>
                         <div class= "col-md-1"></div>

        </div>
    </div>


    <!-- Footer -->
    <!-- JavaScript -->
      <?= $this->Html->script([ 'popper.min.js', 'bootstrap.js', 'custom.js']) ?>
    <!-- Summernote JS -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js') ?>

 <script>
$(document).ready(function() {
    $('#brief-detail-editor').summernote({
        height: 300,
        toolbar: [
            // Specify only the toolbar options you want to include
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']], // Remove 'picture' (image) and 'video'
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});
</script>

 <script>
$(document).ready(function() {
    // Image preview functionality
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview-container').show();
                
                // Hide existing image container when new image is selected
                $('#existing-image-container').hide();
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#image-upload').change(function() {
        // Basic validation
        if (this.files && this.files[0]) {
            if (this.files[0].size > 2097152) { // 2MB in bytes
                alert('File size must be less than 2MB');
                $(this).val('');
                return false;
            }
            
            if (!this.files[0].type.match('image.*')) {
                alert('Please select an image file');
                $(this).val('');
                return false;
            }
            
            readURL(this);
        }
    });

    // Remove image functionality
    $('#remove-image').click(function() {
        $('#image-upload').val('');
        $('#image-preview').attr('src', '#');
        $('#image-preview-container').hide();
        
        // Show existing image container again if it exists
        if ($('#existing-image-container').length) {
            $('#existing-image-container').show();
        }
    });
    
    // Handle remove image checkbox
    $('#remove-image-checkbox').change(function() {
        if ($(this).is(':checked')) {
            $('#existing-image-container img').css('opacity', '0.5');
        } else {
            $('#existing-image-container img').css('opacity', '1');
        }
    });
});
</script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#country-id').change(function() {
            var countryId = $(this).val();
            if (countryId) {
                $.ajax({
                    url: '<?= $this->Url->build(['controller' => 'Selectdirectory', 'action' => 'getstates']) ?>/' + countryId,
                    type: 'GET',
                    dataType: 'json', 
                    success: function(data) {
                        $('#state-id').html('<option value="">--Select State--</option>');
                        $.each(data, function(key, value) {
                            $('#state-id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#state-id').html('<option value="">--Select State--</option>');
                $('#city-id').html('<option value="">--Select City--</option>');
            }
        });


        
        $('#country-id').change(function () {
    var countryId = $(this).val();
    if (countryId) {
        $.ajax({
            url: '<?= $this->Url->build(['controller' => 'Selectdirectory', 'action' => 'getPhoneCode']) ?>/' + countryId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    // Set phone code directly as an option
                    $('#phone-code').html('<option value="+'
                        + data + '">+' + data + '</option>');
                } else {
                    $('#phone-code').html('<option value="">Phone code not available</option>');
                }
            },
            error: function () {
                $('#phone-code').html('<option value="">Error fetching phone code</option>');
            }
        });
    } else {
        $('#phone-code').html('<option value="">--Select Country First--</option>');
    }
});



 $('#country-id').change(function () {
    var countryId = $(this).val();
    if (countryId) {
        $.ajax({
            url: '<?= $this->Url->build(['controller' => 'Selectdirectory', 'action' => 'getPhoneCode']) ?>/' + countryId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    // Set phone code directly as an option
                    $('#mobile-code').html('<option value="+'
                        + data + '">+' + data + '</option>');
                } else {
                    $('#mobile-code').html('<option value="">Phone code not available</option>');
                }
            },
            error: function () {
                $('#mobile-code').html('<option value="">Error fetching phone code</option>');
            }
        });
    } else {
        $('#mobile-code').html('<option value="">--Select Country First--</option>');
    }
});


        $('#state-id').change(function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: '<?= $this->Url->build(['controller' => 'Selectdirectory', 'action' => 'getCities']) ?>/' + stateId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#city-id').html('<option value="">--Select City--</option>');
                        $.each(data, function(key, value) {
                            $('#city-id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#city-id').html('<option value="">--Select City--</option>');
            }
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#addCourtRow').click(function() {
            var newRow = `<div class="court-row">
                <table class="form-table">
                    <tr>
                        <td class="form-label">Court</td>
                        <td class="form-input">
                            <input type="text" name="court_of_practice[]" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Place</td>
                        <td class="form-input">
                            <input type="text" name="place[]" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>`;
            $('#courtOfPracticeContainer').append(newRow);
        });
    });
    </script>
</body>
</html>