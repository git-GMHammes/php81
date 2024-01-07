<!DOCTYPE html>
<html>

<head>
    <!-- Metadados, estilos, scripts (como React e Babel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <title>Minha Página com React</title>
</head>

<body>
    <!-- Conteúdo principal da página, incluindo o elemento raiz do React -->
    <header>
        <h1>Cabeçalho da Página</h1>
        <!-- Outros elementos do cabeçalho -->
    </header>

    <main>
        <div class="LoginForm"></div>
    </main>

    <footer>
        <p>Rodapé da Página</p>
        <!-- Outros elementos do rodapé -->
    </footer>

    <!-- Código do React -->
    <script type="text/babel">
        import React from 'react';
        import { Formik, Form, Field, ErrorMessage } from 'formik';
        import * as Yup from 'yup';

        const LoginForm = () => {
            const initialValues = {
                email: '',
                password: '',
            };
            const validationSchema = Yup.object({
                email: Yup.string().email('Invalid email format').required('Required'),
                password: Yup.string().required('Required'),
            });

            const onSubmit = (values) => {
                console.log('Form data', values);
            };

            return (
                <Formik initialValues={initialValues} validationSchema={validationSchema} onSubmit={onSubmit}>
                <Form>
                    <label htmlFor="email">Email</label>
                    <Field type="email" id="email" name="email" />
                    <ErrorMessage name="email" />

                    <label htmlFor="password">Password</label>
                    <Field type="password" id="password" name="password" />
                    <ErrorMessage name="password" />

                    <button type="submit">Submit</button>
                </Form>
                </Formik>
            );
        };
        export default LoginForm;
    </script>
</body>

</html>