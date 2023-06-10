type CreateUserResponse = {
  name: string;
  job: string;
  id: string;
  createdAt: string;
};

async function createUser() {
  try {
    // 👇️ const response: Response
    const response = await fetch('https://reqres.in/api/users', {
      method: 'POST',
      body: JSON.stringify({
        name: 'Victor D',
        job: 'manager',
      }),
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
      },
    });

    if (!response.ok) {
      throw new Error(`Error! status: ${response.status}`);
    }

    // 👇️ const result: CreateUserResponse
    const result = (await response.json()) as CreateUserResponse;
    const json = JSON.stringify(result, null, 4);
    console.log('result is: ', json);

    return json;
  } catch (error) {
    if (error instanceof Error) {
      console.log('error message: ', error.message);
      return error.message;
    } else {
      console.log('unexpected error: ', error);
      return 'An unexpected error occurred';
    }
  }
}


async function imprimir() {
    let result = await createUser();
    let p = document.createElement('p');
    p.innerHTML = result;
    document.body.appendChild(p);
}

imprimir();