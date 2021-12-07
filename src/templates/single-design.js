import * as React from 'react'
import { SingleDesign } from "src/components/ApiStore"
import Layout from "src/components/Layout"

export default function PageTemplate({art_id, slug}) {

  const ref = React.useRef(null)


  /*toPng(ref.current, { cacheBust: true, })
    .then((dataUrl) => {
    })
    .catch((err) => {
      console.log(err)
    })
*/

  const [product, setProducts] = React.useState([]);
    
  React.useEffect(() => {
  
    SingleDesign({art_id, slug})
      .then(result => {
          setProducts(result.data);
      })
      .catch(error => {
          // Handle/report error
      })
  
    }, []);

  return (
    <Layout>

      <h1>{art_id}{slug}</h1>
      <div ref={ref}>
        {/* DOM nodes you want to convert to PNG */}
        testing
      </div>
      <img id="aa" src="" alt=""/>
    </Layout>
  )
}
