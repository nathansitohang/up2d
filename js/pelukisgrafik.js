var internalDataLength = internalData.length;
i = 0;
while (i <= internalDataLength) {
    var randomR = Math.floor((Math.random() * 130) + 100);
    var randomG = Math.floor((Math.random() * 180) + 100);
    var randomB = Math.floor((Math.random() * 200) + 100);
  
    var graphBackground = "rgb(" 
            + randomR + ", " 
            + randomG + ", " 
            + randomB + ")";
    graphColors.push(graphBackground);
    
    var graphOutline = "rgb(" 
            + (randomR - 80) + ", " 
            + (randomG - 80) + ", " 
            + (randomB - 80) + ")";
    graphOutlines.push(graphOutline);
    
    var hoverColors = "rgb(" 
            + (randomR + 25) + ", " 
            + (randomG + 25) + ", " 
            + (randomB + 25) + ")";
    hoverColor.push(hoverColors);
    
  i++;
};