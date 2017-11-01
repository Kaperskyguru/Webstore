<!DOCTYPE html>
    <html lang='en'>
        <head>
            <style>
                
                button.accordion {
                    background-color: #eee;
                    color: #444;
                    cursor: pointer;
                    padding: 18px;
                    width: 100%;
                    border: none;
                    text-align: left;
                    outline: none;
                    font-size: 15px;
                    transition: 0.4s;
                }
                
                button.accordion.active,
                button.accordion:hover {
                    background-color: #ddd;
                }
                
                button.accordion:after {
                    
                    /* Unicode character for "plus" sign (+) is '\02795' */
                    
                    content: '\02795';
                    font-size: 13px;
                    color: #777;
                    float: right;
                    margin-left: 5px;
                }
                
                button.accordion.active:after {
                    
                    /* Unicode character for "minus" sign (-) is '\2796' */
                    
                    content: "\2796";
                }
                
                div.panel {
                    padding: 0 18px;
                    background-color: #ddd;
                    display: none;
                    overflow: hidden;
                }
                
                div.panel.show {
                    opacity: 1;
                    max-height: 500px;
                }
            </style>
        </head>
        <body>
            
            <h2>Accordion</h2>
            
            <button class="accordion">Tiger</button>
            
            <div class="panel">
                <p>The Tiger is the largest cat species, most recognisable for their pattern
                of dark vertical stripes on reddish-orange fur with a lighter underside.</p>
                <p>The Tiger is the largest cat species, most recognisable for their pattern
                of dark vertical stripes on reddish-orange fur with a lighter underside.</p>
                <p>The Tiger is the largest cat species, most recognisable for their pattern
                of dark vertical stripes on reddish-orange fur with a lighter underside.</p>
                <p>The Tiger is the largest cat species, most recognisable for their pattern
                of dark vertical stripes on reddish-orange fur with a lighter underside.</p>
                <p>The Tiger is the largest cat species, most recognisable for their pattern
                of dark vertical stripes on reddish-orange fur with a lighter underside.</p>
                <p>The Tiger is the largest cat species, most recognisable for their pattern
                of dark vertical stripes on reddish-orange fur with a lighter underside.</p>
                <p>The Tiger is the largest cat species, most recognisable for their pattern
                of dark vertical stripes on reddish-orange fur with a lighter underside.</p>
                <p>The Tiger is the largest cat species, most recognisable for their pattern
                of dark vertical stripes on reddish-orange fur with a lighter underside.</p>
                <p>The Tiger is the largest cat species, most recognisable for their pattern
                of dark vertical stripes on reddish-orange fur with a lighter underside.</p>
            </div>
            
            <button class="accordion">Lion</button>
            
            <div class="panel">
                <p>The Lion is one of the big cats in the genus Panthera and a member of the
                family Felidae. The commonly used term African lion collectively denote the
                several subspecies in Africa.</p>
            </div>
            
            <button class="accordion">Cheetah</button>
            
            <div class="panel">
                <p>The Cheetah also known as the hunting leopard, is a big cat that occur mainly
                in easternand southern Afric and a few parts of Iran.</p>
            </div>
            
            <script>
                
                var acc = document.getElementsByClassName("accordion");
                var i;
                
                for (i = 0; i < acc.length; i++){
                    acc[i].onclick = function() {
                        /* Toggle between adding and removing the "active" class, to highlight the button that controls the panel */
                        
                        this.classList.toggle("active");
                        
                        /* Toggle between hiding and showing the active panel */
                        
                        var panel = this.nextElementSibling;
                        
                        if (panel.style.display === "block") {
                            panel.style.display = "none";
                        } else {
                            panel.style.display = "block";
                        } 
                    }
                }
            </script>
        </body>
    </html>