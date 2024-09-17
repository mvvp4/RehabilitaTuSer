<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="loginpag.css">
</head>
<body>
    <div class="container">
        <div id="login">
            <h1>INICIO DE SESIÓN</h1>
            <?php
                include("conexion_bd.php");
                include("controller.php");
            ?>
            <form method="post" action="">
                <table>
                    
                    <tr>
                        <td><label for="nombre">Nombre:</label></td>
                        <td><input type="text" id="nombre" name="nombre" required></td>
                    </tr>

                    <tr>
                        <td><label for="email">Correo Electrónico:</label></td>
                        <td><input type="email" id="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Contraseña:</label></td>
                        <td class="password-field">
                            <input type="password" id="password" name="password" required>
                            <button type="button" id="toggle-password" class="password-toggle">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAk1BMVEX///8AAADl5eXk5OTm5ubj4+P19fXu7u74+Pjw8PD39/ft7e3r6+v6+vry8vL8/PzR0dGnp6ecnJy6urp9fX3Q0NDc3NxycnKwsLDIyMhGRkaSkpLDw8NUVFQlJSW2trY5OTmFhYVlZWV1dXU7OztdXV2NjY1RUVFqamotLS0PDw+ioqKDg4MgICBBQUGYmJgYGBgUSNd+AAAXz0lEQVR4nOWd6XbjqhKFsSRLQkJgx0PsxJ15zul2v//TXY22oKoAyU66e11+nKyzGxMTScXHpkCMMZYFUZCVP8MoSMofSRCF5Y+0VcsfOalym1q0auSpxhY1EqQqbaqq/vN/0MM0DMK06mHQ9iWYtmrmUnmjFq0aONTQqUZBIHQ1dqmyUZWhhq3KsiyN8ySP0yzNk0SWP2SS5Gk6Sk2ShI9Qs3OoWalKRC3/lGF9icLmEk2DaXU5p0DNgFq0atio3KGGtFp+B+GjNpeorypdlYYaVmqEPnzhyQ/fFz+S1oevCPvq917D4A9cw+o5LG9d89k6qskwlVvVjFCzAWrdgvnElXVzTM3y/4NYyv4vxsNp2Dx84bTuS/mTVIvyR+ZSua6GYYirwqWq8kf1rQNNLZ8vRO3qNg8fk53a/fo8NLrVxhSjA/7q+G51Kt4BOdvMZ70O4N3qq//YaLG+m1Rlo8SA0aLtoX94SfRA4go67vACVSq8bCZted9J36CTVKyTpjLvIVWa5sNUDtXknGqLatl6ciwP1VfJ2q9UDxGHupraRJrRw/xpg7/3MN+q6levh5MfHB/8Q33wr3r4z4wWi4lW9nngPVp82TU8E2636m+9hxPpA3DsiF9J2mJS1oeyQWrmofKxanxhdHAyK2qAK+ty0MJB/YZYOibCIrE0mJodnGxBLA2RWPrPjIf8Euuhx3gYNqCVn4xqCeCU8zLNDHRwEptYh5MOhWpjAK7rlqcqoBoAte1AegU6+Mz7dU2A61Sm35pfMlr43rC20ULcwks4s9yaX++1jUE12/xQfoAOLqV1ftiprMakvMGvvIWyPPdR+Wlq4qFmnQpHinI05Me6WVNX6i18s9d2EsAVsIMXNccRqPbveW1wpPgp/6DXZke1EdcwgoP9ZCE8vLag8do00Cr/F4GyVsXrjle5p8rgSPHKGijT63ao1le/KpaOBTg0lm7hJVwzO6r9Y17bDejgJYMP3zd5bQSqeQMcZj99wktosaqA1zYo0oRopAnRcWGAekA1TJUR7OBnb1I4RUeLf8lrKx5BBz+OdVFU+zqvbSyqWeeHa3gJd4MM/h6UFQd4KlBUK1D8OrvaolrR4Bf7ATp4xdC6hQlwTQvM/fCd32ub+vs00QJewnWkodpf5bUF1e+MhowWEhspRqzMnOEaWlAtEkJWv4yLqZQymU4jVVXKBXdeQ4GMFJmBaj5eG8Ck7ExqobJMyelic718fb85TvE+bt6v3l42izUv+6oKiF9VC7xqAXZwn0FUy1CAa9Sv89oiETO52r/B26xffj/vdwnnIkFjafwf+MAHD9oLh8XS7/Ta4tn88qe1c73yfLFCHyhkpLgVQzMVzuG1hZpatlrsltB1cJSHzTQWQa/d8l54BbWupG0JlfbaBkWa0BJpwkCy7BZOdvzK3WeUieAYPVawyhbGFFek0W/NE2/YiOcbOEIPKT8vpsWhXfgIv3HtJgzIW/OcXlsfv3ZvJ3WvKVeLFr/m8N+mARJevL22GtWKtIAAx61q0wJn8dw7srjKy7QM/Ij7dJ1BVCt6ACcR9Ww+TbQ8V/fq8jBjsMHfzBfVzu21Rdn64az9qwoSrhbHx8yeWjPaa8MDaCRXMKp/Rblj3gEUeG28AS3e4hdPBqhqdlr09C+z+PgdaijjLaoZKtfUU2Mp/4L7kyhvQ1DtbF6bhOD4ZUV+d15b9Uhu3N/rbGVPodpAr629YadAhZGGzZ6+sYMTPiKDNjhttPjGG7QsG2FHNRrgxs0PQ4Ysq9vK8+P1fLFar2az2XQ9u/3cL/3nVlV5YqOTaTVUK2ooKwxUg6qU/gTzsF+UMJ1JWTClykgulVKxlJWvEe4+L80sIKLMCvjNOoArUIDrVOYc5iGqpWzmN/v7udxE5WdEe3MDry2vn5nFy537zyRpVDu/1xapa5/uPW8CyUXKXEZ3JATLFnAJVCvrU7Ogh1zDfO0RQp83RfNX9V0sZbmtky+JJYC6ZsDVk1FBDjegjFIZkvZhlLuNZApv16IWLF5Q/JdCKOMoqiHqwFgapfeu/j2upGLjFkuFXKMPwBxGza/y2kTkCgqfMjll7akMTPA33MmBD994ry1HrKF++bht4GnosmhfRcbZXb0YYEU1l9fmiWrS/gj+XpTjghZTjJvQR5XvoN3n/q3Z1E0C/dacglvzqDL91rTcsJFjlN+Qt+aQGxZheX6Asq5u/hy1LTgBboDXxvNnW/+uuR5exi6WwpZfmIlqbD/5EMyOaprX5oVqittizEMS+8BehVRFZlHZC2w7M+oWRVzJa2aoWLuV6unTiLWFH9+3KWN+y6L2xdIAWafYZMb+w7BNFl40zHcmr80aRK9ldKZMBQkdkTs4LnTRds78Rgufa4glJXXlKs/PldcmkV8zA3tI5cHY+/T32kq4QVCtVTlPd3QHPzOp1cVbaFVZzZyKcuaE11UQeJ8Vl3pd1fsyL4rrLSAAxz1iKafdmKd1EnlDmYrWt4vb+Xy+WURNzNPrYonO6wigWn/ivEzZGbw2jiyQtOW+u/FdmQoiU9t7LRi/7rdJkmh1czjpvOfmHtJcX9hfsjN4bXQHt555bUIu0LF0OevXzZGRoggNVAvMFLClj9dmm1uE9BV8yoVPImYo8jk50jzdyqKrK+E/z2V3ax5mEcD+upSnzS0S8hlcMuWT1yYz+h6oyvuqGy3g0uON7LdbjwBIsvAjY3aAs17DjGTtjWuxtL2Ga0jSRnmo915xLH0tAq4atgTUwzrKa+NFUfAKtIoWtIoWfehxcMaMukWDaobKkE0EsGzTPFfIlpji0G4LZSn+ffas/x3auvLwHZgF1agO3nCvvDYlPFfdXsDmyapETbu9SBMTD/SFDeAso0VEmb6vyi+1Bgn/RHlG5hRLOALE1Pxt4xwtsGtYIE91XR4YY1S2Sf8aIrm9ZEEuTsSOqNahuaR8zJWX18YN0CJc93KYh3VhC5L6A3mWOfLNZIbdzXVZS27WdXhtESdc0b1nXlt4WgffoXXRXCKKkWtYGTIeIhOZusxdD183HjpHCXtZUQmoCRH+bjg2HtJem7wnOlh9eUdeW606XHpXeWakqyaIAPjK3F5beLhhc+J23/kN81zYQcZdqkTn3q2p+zRECLuMcZ+GIV6bIKb0O99EzBOjzOS/AvXP2t+Gpe9X5SLx9dqiAG9hwzxRTVltOY+ipHXjOjVSbwvsGpqgVaJPjEeJTYbURVCtUBbTY3Jjzxmuy5xp/lkBoEwSXcwVrIv4NESUmHvvP5SE8Xi1mfIsLlg6u7bSzk/Z3BBgr1AP4PDn6Cb38do4TsvXzoevi+oCD1NvU3YYATJ5a1nFXwj3ISAZPi4+SLfXRuB2RYmeWxAkliL8cytT1vPaBCcXkl+lz3ltxMxVh3DTa6tYJ0Wm2pMq48oL1Sq1wCLdgyrMuooEsBTDLwhwyFaMSZX8ZtTtx9JpNR6iE54rzz2ktXoPP3+pYN0gx2+0ZcYAquEAh/yiyeSjGy0Iry3dY596ZwDrLI8k/PxzhjpwCeogmAa67rX1VZwsf0hkPDx4bcRDWH3CB9UqlcNAfsOJxdIMuQoXgl4ANV01/gt+vpwbcN1rO8TS6qIqtINrFUb6rdlcuFYNNJXBb72uoxtWF26e/I0M8x3eQDXFvy/rYimcW6C5EItBe2bgOvyjdmv26yJwt9NQDXhtJsChiPqhAtxrQ9P/axMFy2s7qvpSJ9yLhdv+VV0Y1V6R8GIDOHy6+BDjXhtHJ60//Fy1TlUANh4q2EPwq1DIt1srvC4JcBkaGjey5/exo0+DEeNPu6sGVDhv2lLLohw5kMWOaugGbjSgStRrQ9YNqlts2B5SuPqgiGXRHKHDdMzpnhjj/sJmT+ik63Hgzq4gN835K3JnKfxtnxSqBbYMNhTfPgvgtWWo27qSfqh2UJk5Nfwvw+sqZKTInKiGfgfsi0+maVu3i6Uxeo9O+OA9pGZ8vBDoihQ2iS3nFG5UgyoOmm/meIiP9e9y8B5Sc2IxF2imAjIBeVUeh4Agj6TCL86hbpt/htPBk/RDtZ4Ke4hlsGHb7KfSfQgIphIJvYdgyxr8woNuVc1IPAnRy9mp8NpcgClyXRdOgNulTg+QKTQoI1yhapbJ+l5bwdEeRkO3sSUm+D1jPVTI3C6IBvewUfEHbCfAaIEG3T2FapTXloClXAUz2CLkz7nPuzOGjHadAIeC26WCXhuO3bE6YpJAUU1oSCXBY3/LQN0M2TwZ29ulVeQQqervWtU1vLYIx9IqWWDIWV8ghPxO+nXrqIQM9gvGANZ5ARxHI+kuwrw2gV7ul4GjBUSjPRgtkG32ChsXLKNFtwaDG3tLSXhtqFG6q6+hFdW0bQWwhamR14alr9HZbvZ3I6Cs+S4prw1fFF1LF6r1VQUf5w+ptVBgB7IMRbVWzfBvXDR1Y+C1EesBEZ2OAr02icTkn/1zWjAXMAbntfl4bRFGRpM20Yjw2hLU737K/MfDgGMD68e6Vxf+8344qjWJmJDey/IsLV5bmKFoU+Um+HptOZhdNH/XA2gh+RRsOKrVbiKKax/CyGvT1y0Kga6ZLNu1Ep91Cww5y/Jrx+qLgeU+5YOOo+3s0BxP2Fqb0GOszET4os6F9O4hdrRT08cNZ3mKjBQ0qtkALse93U9Qt++1VYEkx5cDbhnz89qKEMuEbcvNG/LkrMegGhf4QnB9+AmV11ZDmcgL/HySLQPwJFCkEnmKWtFUeWO+7fbVGF9If5e5WbeJNFpOVIovAW+Fj9dWq4P2CE+j4ahWsju+/ph45bVReQYz4TNaVGpx79/Baz5mYi/wZ33LTKzTMxU6sKZyEmfM7bU1AJe4d/a25bcMPFDN8NqCHG9/X4drn7w2Krd7HTu9tkZNhW8PbwsfVIt1NcY72CzjGnWpvDYUFqob1em1tSqR8mKWX1Jz4LxQLSIyIe6IjXp4XhsOfBWFu8fDRqXWsPWy7bbZDRjxOZEyV5B5bej7nohHuX4WvQCOShzTyoMc/L6nSBAdrNCXymtDc4RxZ6r8qye+k2GPMUNiUROPpa0aUWmvK+pETNb7fnoWNPUk3XJfgKPug0O5ZhiU2VCNIJkqI821hxQugJJPUkV+XkfrKk4ErK7EsAU7wJG7BPeWPaQNqokKcoQOcDHFly/sUPeIVAIDrXRrO8BkE7tb0FRFfaMlo1uw7j+kskQfeP0Htu8WbeIPvkZblzu/0657+XLU7o238add42se5TAWOUeLTs0Fld41G3g8Oz6jn1QL8UP2kOoAp8gN6lOIapQDJ9gttv71ZkM1qDJBzViuGES1vtcWxy1+xQ3kxBp+YZ5DUxbKrGu0ELfwVP4venB8KA91D6CltaCpKQlJv6rKlhaYduGQPaRkOGzyz3CAM05PiHL48WtOnbSAoZokE8fvfM5UsO8hJQ/s/CUd4+HhkUzu4acHoVpCpv7fDdxDir3vSdJnku783oKAbbO/HYJqU3Lzxh2oC/eQll2uL1xkXIxODVD/ry2Pqqlbd6uuezyOtqci2+xl0LvIRyjr1B6qyRh3jqryVB1/rl84owXXaNGq9MlsN2t8ibevYk76TvTr2r02+uDJq/ImdJ/iZnptKMBR4+KkAhwIWjrAIdO559gb1SwnxjwDrCP2kIoa1UTntbUAp6m2zbw3q6zBJIHil8AWMqY4qoEWMmk5OfSNKXcLifd5bbbZ3rKqRL+CBH7gnjE/VLNtLnqB57WhrytxjxbtA2XbJTLZSEGOFsgdLnxQLWIz2+xrDmeC7tOu8VOUWjVe23aB3G3rjfUQ4FJkJj0Xh8VSEtUix9GvOwYWS617SDvQimv8ig38qlWZxtaT6J6nSlYfreseW1DYgSwNUoG6R1WqxH6y5rpwtHBUB53XZj+P/HKdwFiKTFlXGKr1L2eQR/ZzC+/k4cIRqDb2vDZJT/aaPkZg9oSMFOaDaj6SLHCcy/jgevi8vDb81ZyJy0B7qBaSemEVGc2qBm2nuAnL4FuXfcacqEZ4bRqqmQDXQhnl5R3K0+IATyk2p7hnCNYdL8bOuXVxBS5chKBarSq714bfsEXicJfK8rJuX1SRI7cbjWqCyQvn/uinGDhwnue1QVSjVIxRwPf4XNc3IfyXDeHLMSl83hvxwpkfqqFem9JRLSNUIQOfFdBf8ykyp3hnh3ZbXCxBq/zWcuO1sXYb61AmUFQTSV8d824E+vAGvSCIsItMrCuY2r547JydVDs3mH1jwhnfLMdn415l8SxNVBNb76MJNjI7BpLx70awAtxxWTSyTajokkRgz7Df5auYSUyRvDaP89riA6q1rBP30AdX6/8tVt7rvIeyLHot1D+wZGG0bFQGvgP+zUyVaRcOQzXywF3HCVBIicAUGc9gBuVRCDrb7WSvzbIryGJSYeUzB6h27/O5p7XU87yJdbSxXpv13eqrAUeY3HAT1RKv5f7FsGw3i9cWMABwHACc7qpFhedqdlXaVJBeC/huF73sZd5BWdR34CJT1VCtr57wJp0Wv7zO86rXT0xUcxy8XJb/YgLK8CXUw61pydzTd/x6qYI7JlVNmaWsh2p1C65B9THQ+uLeHXzsYU8to1QDZUKoCuBEg2pHtUE1m5pLcmXvWJZZrwVZtWD1mapPRDFXbd3jb8vLFlA1IdQm0gx/jZXxamAh546hWwFXzR5mrrtFWNce0rN5ba4saMFWNnieg4k9txyefbfhOTLnGz9a+HhtiW6thJhKT8/fGTNdNTprarlmsXULwvB3I/iimkuVim3xdbBdbNalziH6sciKeACUHX85oY56z4x5OftOGcPyvH8wsIcU3aDz+skBflmz3c7ttfmkCaXYPp1IBYZ1gZyff7kJ6n0EozYmnMtr81FzuGV6CVw1c9v+68W6nOaEHnltfqhmem1lX6HXZqgdqrWqjl89FVvPFIarFmW9OcXVcl59K6FBGQdQRqsoqo332vBdssdl0QjZeXeRgz2k1Uhx9XA/X+UpT0SvhRF7SL28thbKzL64Aa4HT00gQVLZbqT5rcOsvA2lTJpk1aDfQgTaHYdqvR4WOqqpQrUAl/mqfYBLsC0xvKnbRyqluhZQKPNWE0o9ApyX10agGrYsimyzl1TdQXltygfgzue1kSoyys0iRq3BDMtrGztajH87oAFw9cni0CK95MYCqGVZdMQeUn+vbSgmcYmoCplEyezYgvQELVq1tiBRlWkXzo1q5h5S7XIib7P/ZNhmA2RZ1J7XZlO/0mszH0n06K5ve/i+xmvTVGSp6baaYg95uVUAVBrVxnltR/zCUc0CcDG2edIKe0WEQpmP2kGZS/UdLewHmrRvQUDmFGs6280/r+2LvDYbwOFn7hVwTvGIYB0GeyNQbaDXNgLVgIolOktlIhWCamqYiqCaXW0ijdVrQ1ENqMjpyvs8PBHV/iavDXHOfoOJ/Z8bLU732tAs2aM5M/jlVkNQzeW1yeoFU3H1gl7eclEDZX01tqpVC8gayy9F1P1m1fWuID+vDXuf2CoagmqG+rd5bVEMLf036ffwff3s6Rxem0BGii4zJfRAtSF7SE/y2nQoGwBwBezgNaNQzRfgIqiWUBahqGZTmX5r6njjC3Aw2/UjZ8NR7Vu8tlEAhyyT1W8ct6Pa2QDO7bUpA5MaKPNXkYPefqVI3QapxqoJVHMvtRt4c8Nr80O1RoWXcE2h2r/ptcFZ0yV8+M49WgzIgj7da4PL8Tlj5sYEF8B9rdcmj8xj/PBSAZJeq+YfkY/+AZVpF86NatBrC81tPx+nvJf77/TajHzaxR9Cta/02rQ8zCsM1bwB7ku9tmqQhqhGqwf8EqKfdbASBpRpdW1QRquDUc3itfmjWk+Nst3Bhppz+xLqX+61mT3shYxmyeLnin0Pqo312sYDnGLx7nM+K+9oiF/jAe6AX8qh5rRqjzS2SSGmRtSk0BJp8ASMEI00IRZTcFV2atXDs63MfDWq/fm8Nj9UGwhwENWGARyDrHMCwJHqHwS46o+WwAs30Gs7wVX7N7w27DH7e2ZPZ89rGxFA/4DX5oFqlOpEtfTrUQ16bZQTNSKv7RRU+8u8Npirxoah2rd5baqBnKzLNFMNlHXoc0ZVkmqhqck51VScIdKQMcVbhagGVTPS2FGtp/4PPho+P+ovBLkAAAAASUVORK5CYII=" alt="Mostrar/Ocultar contraseña" id="eye-icon">
                            </button>
                        </td>
                    </tr>
                </table>
                <p class="forgot-password"><a href="#">¿Olvidaste tu contraseña?</a></p>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>
