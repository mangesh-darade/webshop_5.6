<div class="row">
    <div style="margin:50px -5px 50px -5px; text-align: center;" >            
            
        <h1 style="margin-bottom: 50px;">Section Preview & Edit</h1>
         
            <style>                
                .blue{
                    background-color: #0063d1;
                    color: #ffffff !important;
                }
                .flat-green{
                    background-color: #6dc4b4;
                    color: #ffffff !important;
                }
                .green{
                    background-color: #62ab00;
                    color: #ffffff !important;
                }
                .orange{
                    background-color: #fd6602;
                    color: #ffffff !important;
                }
                .red{
                    background-color: #f5363e;
                    color: #ffffff !important;
                }
                .yellow{
                    background-color: #ffd40e;
                    color: #000000 !important;
                }

                .fullwidth-notice .message {
                    padding: 10px;
                    margin: 0;
                    
                    font-weight: 300;
                    font-size: 1.425em;
                    line-height: 1.88em;
                    letter-spacing: -0.01em;
                    text-align: center;
                }
                
                .fullwidth-input {
                    width: 100%;
                    border: none;
                    outline: none;
                    line-height: 1.68em;                    
                    text-align: center;
                    
                }
                
            </style>
            <div class="<?=$webshop_settings->theme_color?> fullwidth-notice stretch-full-width">
                <div class="col-full">
                    <p class="message"><input name="section_data" class="fullwidth-input <?=$webshop_settings->theme_color?>" type="text" value="<?=$section_data?>" /></p>
                </div>
                <!-- .col-full -->
            </div>  
        
    </div>
</div>

