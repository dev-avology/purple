import React, { useState, useEffect } from "react";
import mergeImages from 'merge-images';
import img1 from "../assets/images/purple_artist1.png";
import img2 from "../assets/images/purple_artist2.png";
import img3 from "../assets/images/purple_artist3.png";
export const Merge = () => {

    const a = [
            {
                id:'aa',
                img11: img1,
                img12: img2
            },
            {
                id:'bb',
                img11: img2,
                img12: img3
            },
        ]
      for(let aa of a){
          console.log('aa')
        mergeImages([
            { src:aa.img11, x: 0, y: 0 },
            { src:aa.img12, x: 12, y: 0 }
            ])
            .then(b64 => {
                document.querySelector('#'+aa.id).src = b64;
              });
        }
        const Merging = a?.map((aa) => (
            <div>
                <img id={aa.id} /> 
            </div>
            
            
          ));
    

    //     mergeImages([
    //         { src:img3, x: 0, y: 0 },
    //         { src:img2, x: 32, y: 0 }
    //       ])
    //         .then(b64 => console.log(b64));

        return(
            <>
            {Merging}
            </>
        );
  };