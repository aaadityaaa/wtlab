import { useEffect, useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
///addthis line
import axios from 'axios'

function App() {
  const [count, setCount] = useState(0)
  const [student, setStudent] = useState([])
  const [name, setName] = useState('')
  const [email, setEmail] = useState('')
  const navigate = useNavigate();


  //this gets dataa from the server
  useEffect(()=>{
    axios.get('http://localhost:9876/')
    .then(res=> setStudent(res.data))
    .catch(err=>console.log(err))
  }, [])


  //this is for sending data to the server
  function handleSubmit(e){
    e.preventDefault();
    axios.post('http://localhost:9876/create', {name, email})  //passing data to this url on the server
    .then(res=>{
      console.log(res)
      navigate('/')
    }).catch(er=>console.log(er))



  }

  return (
    <>
    <button className='btn btn-success'>Add+</button>
      <table  className='table'>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {
            student.map((data,i)=>{
              <tr>
                <td>{data.Name}</td>
                <td>{data.Email}</td>
                <td>
                  {/* <button>Update</button> */}
                  <Link to={`update/${data.id}`}>Update</Link>
                  <button>Delete</button>
                </td>
              </tr>
            })
          }
        </tbody>
      </table>
      <br />
      <form onSubmit={handleSubmit}>
        <h2>Add Student</h2>
        <div>
          <label htmlFor="">Name</label>
          <input type="text" placeholder='Enter name' className='form-control' onChange={e=>setName(e.target.value)} />
        </div>
        <div>
          <label htmlFor="">Email</label>
          <input type="email" placeholder='Enter email' className='form-control' onChange={e=>setEmail(e.target.value)} />
        </div>
        <button className='btn' > Submit</button>

      </form>
    </>
  )
}

export default App
